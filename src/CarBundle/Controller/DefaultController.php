<?php

namespace CarBundle\Controller;

use CarBundle\Entity\Car;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DefaultController extends Controller {
	/**
	 * @Route("/our-cars", name="offer")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction( Request $request ) {

		$rep = $this->getDoctrine()
		            ->getRepository( 'CarBundle:Car' );

		$cars = $rep->findCarsWithDetails();

		$form = $this->createFormBuilder()
		             ->setMethod( 'GET' )
		             ->add( 'search',
			             TextType::class,
			             [
				             'constraints' => [
					             new NotBlank( [ 'message' => 'Vous devez saisir un mot clé' ] ),
					             new Length( [ 'min' => 2, 'minMessage' => 'Le mot clé doit contenir au moins {{ limit }} caractères' ] ),
				             ],
			             ] )
		             ->getForm();

		$form->handleRequest( $request );
		if ( $form->isSubmitted() && $form->isValid() ) {
			//TODO
		}

		return [ 'cars' => $cars, 'form' => $form->createView() ];
	}

	/**
	 * @param int $id
	 *
	 * @Route("/car/{id}", name="show_car")
	 * @Method("GET")
	 * @Template()
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function showAction( $id ) {

		$car = $this->getDoctrine()
		            ->getRepository( 'CarBundle:Car' )
		            ->findCarWithDetailsById( $id );

		return [ 'car' => $car ];
	}
}
