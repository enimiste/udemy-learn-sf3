<?php

namespace CarBundle\Controller;

use CarBundle\Entity\Car;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
	/**
	 * @Route("/our-cars", name="offer")
	 */
	public function indexAction() {

		$rep = $this->getDoctrine()
		            ->getRepository( 'CarBundle:Car' );

		$cars = $rep->findAll();

		return $this->render( 'CarBundle:Default:index.html.twig', [ 'cars' => $cars ] );
	}

	/**
	 * @param int $id
	 *
	 * @Route("/car/{id}", name="show_car")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function showAction( $id ) {

		$car = $this->getDoctrine()
		            ->getRepository( 'CarBundle:Car' )
		            ->find( $id );

		return $this->render( 'CarBundle:Default:show.html.twig', [ 'car' => $car ] );
	}
}
