<?php
/**
 * Created by PhpStorm.
 * User: elbachirnouni
 * Date: 09/11/2016
 * Time: 05:56
 */

namespace CarBundle\Service;


use CarBundle\Entity\Car;
use Doctrine\ORM\EntityManager;

class DataChecker {

	/**
	 * @var boolean
	 */
	protected $requireImagesToPromote;
	/**
	 * @var EntityManager
	 */
	protected $entityManager;

	/**
	 * DataChecker constructor.
	 *
	 * @param EntityManager $entityManager
	 * @param bool          $requireImagesToPromote
	 */
	public function __construct( EntityManager $entityManager, $requireImagesToPromote ) {
		$this->requireImagesToPromote = $requireImagesToPromote;
		$this->entityManager          = $entityManager;
	}


	/**
	 * Check and promote if true the Car
	 *
	 * @param Car $car
	 *
	 * @return bool
	 */
	public function checkCar( Car $car ) {
		$promote = ! $this->requireImagesToPromote;

		$car->setPromoted( $promote );
		$this->entityManager->persist( $car );
		$this->entityManager->flush();

		return $promote;
	}
}