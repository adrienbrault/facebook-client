<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('AdrienBrault', __DIR__);

Guzzle\Tests\GuzzleTestCase::setMockBasePath(__DIR__ . '/mock');
Guzzle\Tests\GuzzleTestCase::setServiceBuilder(\Guzzle\Service\Builder\ServiceBuilder::factory(array(
    'facebook' => array(
        'class' => 'AdrienBrault\\FacebookClient\\FacebookClient',
    ),
)));
