<?php
/**
 * Created by PhpStorm.
 * User: elbachirnouni
 * Date: 06/11/2016
 * Time: 17:39
 */

namespace AppBundle\Menu;


use Knp\Menu\MenuFactory;

class Builder {

	/**
	 * @param MenuFactory $factory
	 * @param array       $options
	 *
	 * @return \Knp\Menu\ItemInterface|\Knp\Menu\MenuItem
	 */
	public function mainMenu( MenuFactory $factory, array $options ) {
		$menu = $factory->createItem( 'root' );
		$menu->setChildrenAttribute( 'class', 'nav navbar-nav' );
		$menu->addChild( 'Home', [ 'route' => 'homepage' ] );
		$menu->addChild( 'Offer',
			[
				'route'  => 'offer',
				'extras' => [
					'routes' => [
						[ 'route' => 'show_car' ],
					],
				],
			] );
		$menu->addChild( 'Manage Cars',
			[
				'route'  => 'car_index',
				'extras' => [
					'routes' => [
						[ 'route' => 'car_new' ],
						[ 'route' => 'car_show' ],
						[ 'route' => 'car_edit' ],
					],
				],
			] );

		return $menu;
	}
}