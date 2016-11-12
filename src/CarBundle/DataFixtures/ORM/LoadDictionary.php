<?php
/**
 * Created by PhpStorm.
 * User: elbachirnouni
 * Date: 12/11/2016
 * Time: 15:28
 */

namespace CarBundle\DataFixtures\ORM;


use CarBundle\Entity\Make;
use CarBundle\Entity\Model;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDictionary extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load( ObjectManager $manager ) {
		//Makes
		$make  = ( new Make() )->setName( 'VW' );
		$make1 = ( new Make() )->setName( 'BMW' );
		$make2 = ( new Make() )->setName( 'Fiat' );

		$manager->persist( $make );
		$manager->persist( $make1 );
		$manager->persist( $make2 );

		//Models
		$model  = ( new Model() )->setName( 'X1' );
		$model1 = ( new Model() )->setName( 'Passat' );
		$model2 = ( new Model() )->setName( 'Corma' );

		$manager->persist( $model );
		$manager->persist( $model1 );
		$manager->persist( $model2 );

		$manager->flush();

		$this->addReference( 'X1', $model );
		$this->addReference( 'Passat', $model1 );
		$this->addReference( 'VW', $make );
		$this->addReference( 'BMW', $make1 );
	}

	/**
	 * Get the order of this fixture
	 *
	 * @return integer
	 */
	public function getOrder() {
		return 1;
	}
}