<?php

namespace Pizza\CookBundle\Tests\Controller;

use Pizza\CookBundle\Tests\WebTestCase;

class PizzaControllerTest extends WebTestCase
{
    public function testCget()
    {
        $client = static::createClient();
        $client->request("GET", "/pizzas");
        $response = $client->getResponse();
        $this->assertJsonResponse($response, 200);

        $pizzas = json_decode($response->getContent());
        $this->assertEquals(3, count($pizzas));
    }
}