<?php

namespace CarBundle\Command;

use CarBundle\Service\DataChecker;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AbcCheckCarsCommand extends ContainerAwareCommand {
	/** @var  EntityManager */
	protected $entityManager;

	/** @var  DataChecker */
	protected $carChecker;

	/**
	 * AbcCheckCarsCommand constructor.
	 *
	 * @param EntityManager $entityManager
	 * @param DataChecker   $carChecker
	 */
	public function __construct( EntityManager $entityManager, DataChecker $carChecker ) {
		$this->entityManager = $entityManager;
		$this->carChecker    = $carChecker;

		parent::__construct();
	}


	protected function configure() {
		$this
			->setName( 'abc:check-cars' )
			->setDescription( 'Data check on all cars in the system.' );
	}

	protected function execute( InputInterface $input, OutputInterface $output ) {
		$carsRepository = $this->entityManager->getRepository( 'CarBundle:Car' );
		$cars           = $carsRepository->findAll();

		$bar = new ProgressBar( $output, count( $cars ) );
		$bar->setFormat( '' );
		$bar->start();
		foreach ( $cars as $car ) {
			$this->carChecker->checkCar( $car );
			$bar->advance();
		}
		$bar->finish();
	}

}
