<?php
/**
 * Created by PhpStorm.
 * User: elbachirnouni
 * Date: 12/11/2016
 * Time: 15:55
 */

namespace CarBundle\DataFixtures\ORM;


use CarBundle\Entity\Car;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCars extends AbstractFixture implements OrderedFixtureInterface {

	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load( ObjectManager $manager ) {
		$car = ( new Car() )
			->setNavigation( true )
			->setDescription( 'This is a good car for rich mans.' )
			->setPrice( 100000.00 )
			->setYear( 2001 )
			->setMake( $this->getReference( 'BMW' ) )
			->setModel( $this->getReference( 'X1' ) );

		$car1 = ( new Car() )
			->setDescription( 'This is a good car for one who not have enough many.' )
			->setPromoted( true )
			->setPrice( 20000.00 )
			->setYear( 2015 )
			->setMake( $this->getReference( 'VW' ) )
			->setModel( $this->getReference( 'Passat' ) );

		$manager->persist( $car );
		$manager->persist( $car1 );

		$manager->flush();
	}

	/**
	 * Get the order of this fixture
	 *
	 * @return integer
	 */
	public function getOrder() {
		return 2;
	}
}