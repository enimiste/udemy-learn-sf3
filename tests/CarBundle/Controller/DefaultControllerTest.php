<?php

namespace Tests\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase {
	public function testIndex() {
		$client = static::createClient();

		$crawler = $client->request( 'GET', '/our-cars' );

		$this->assertContains( 'Our offer', $client->getResponse()->getContent() );

		$links = $crawler->filter( 'a:contains("Show details")' );
		if ( count( $links ) > 0 ) {
			$link    = $links->eq( 0 )->link();
			$crawler = $client->click( $link );
			$this->assertEquals( 200, $client->getResponse()->getStatusCode() );
		}
	}
}
