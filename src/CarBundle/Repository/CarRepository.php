<?php

namespace CarBundle\Repository;

use CarBundle\Entity\Car;
use Doctrine\ORM\Query\Expr;

/**
 * CarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarRepository extends \Doctrine\ORM\EntityRepository {
	/**
	 * @param array $search ['model'=>, 'make'=>, 'description'=>]
	 *
	 * @return array
	 */
	public function findCarsWithDetails( array $search = [ ] ) {
		$qb = $this->createQueryBuilder( 'c' );
		$qb->select( 'c, mk, ml' )
		   ->join( 'c.make', 'mk' )
		   ->join( 'c.model', 'ml' );

		$where = new Expr\Orx();
		if ( array_key_exists( 'description', $search ) && mb_strlen( $search['description'] ) > 0 ) {
			$where->add( 'c.description like :d' );
			$qb->setParameter( 'd', $search['description'] );
		}

		if ( array_key_exists( 'model', $search ) && mb_strlen( $search['model'] ) > 0 ) {
			$where->add( 'ml.name like :l' );
			$qb->setParameter( 'l', $search['model'] );
		}

		if ( array_key_exists( 'make', $search ) && mb_strlen( $search['make'] ) > 0 ) {
			$where->add( 'mk.name like :k' );
			$qb->setParameter( 'k', $search['make'] );
		}

		if ( $where->count() > 0 ) {
			$qb->where( $where );
		}
		$query = $qb->getQuery();

		return $query->getResult();
	}

	/**
	 * @param int $id
	 *
	 * @return Car
	 * @throws \Doctrine\ORM\NoResultException
	 * @throws \Doctrine\ORM\NonUniqueResultException
	 */
	public function findCarWithDetailsById( $id ) {
		$qb = $this->createQueryBuilder( 'c' );

		$query = $qb->select( 'c, mk, ml' )
		            ->join( 'c.make', 'mk' )
		            ->join( 'c.model', 'ml' )
		            ->where( 'c.id = :id' )
		            ->setParameter( 'id', $id )
		            ->getQuery();

		return $query->getSingleResult();
	}
}
