<?php

namespace CarBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/our-cars');

        $this->assertContains('Our offer', $client->getResponse()->getContent());
    }
}
