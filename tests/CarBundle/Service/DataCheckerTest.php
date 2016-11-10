<?php
/**
 * Created by PhpStorm.
 * User: elbachirnouni
 * Date: 10/11/2016
 * Time: 22:36
 */

namespace Tests\CarBundle\Service;


use CarBundle\Entity\Car;
use Doctrine\ORM\EntityManager;

class DataCheckerTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var EntityManager|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $entityManager;

	protected function setUp() {
		$this->entityManager = $this->getMockBuilder( EntityManager::class )->disableOriginalConstructor()->getMock();
	}

	public function testCheckCarWithRequiredPhotosWillReturnFalse() {
		$dataChecker    = new \CarBundle\Service\DataChecker( $this->entityManager, true );
		$expectedResult = false;

		$car = $this->getMock( Car::class );
		$car->expects( $this->once() )
		    ->method( 'setPromoted' )
		    ->with( $expectedResult );

		$this->entityManager->expects( $this->once() )
		                    ->method( 'persist' )
		                    ->with( $car );
		$this->entityManager->expects( $this->once() )
		                    ->method( 'flush' );
		$result = $dataChecker->checkCar( $car );

		$this->assertEquals( $expectedResult, $result );
	}


}