<?php

namespace Pizza\CookBundle\Tests;

use Doctrine\ORM\Query\Expr\Base;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;
use Symfony\Component\Console\Input\StringInput;

class WebTestCase extends BaseWebTestCase
{
    protected static $application;

    protected function assertJsonResponse($response, $statusCode = 200)
    {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }


    protected function setUp()
    {
        self::runCommand("doctrine:database:drop --force --if-exists");
        self::runCommand("doctrine:database:create");
        self::runCommand("doctrine:schema:update --force");
        self::runCommand("ingredient:create");
        self::runCommand("pizza:create");
    }

    protected static function runCommand($command)
    {
        $command = sprintf('%s --quiet', $command);

        return self::getApplication()->run(new StringInput($command));
    }

    protected static function getApplication()
    {
        if (null === self::$application) {
            $client = static::createClient();

            self::$application = new Application($client->getKernel());
            self::$application->setAutoExit(false);
        }

        return self::$application;
    }
}