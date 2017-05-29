<?php

namespace Pizza\CookBundle\Tests\Controller;

use Pizza\CookBundle\Tests\WebTestCase;

class IngredientControllerTest extends WebTestCase
{
    public function testCget()
    {
        $client = static::createClient();
        $client->request("GET", "/ingredients");
        $response = $client->getResponse();
        $this->assertJsonResponse($response, 200);

        $ingredients = json_decode($response->getContent());
        $this->assertEquals(18, count($ingredients));
    }
}