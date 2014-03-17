<?php

namespace AdrienBrault\FacebookClient\Tests;

use Guzzle\Tests\GuzzleTestCase;

class FacebookClientTest extends GuzzleTestCase
{
    public function testGetMeCommand()
    {
        $client = $this->getServiceBuilder()->get('facebook');
        $this->setMockResponse($client, array(
            'graph/me',
        ));

        $response = $client->getObject('me', array(
            'access_token' => 'fake_facebook_access_token',
            'fields' => array(
                'id',
                'name',
                'first_name',
            ),
        ));
        $result = $response->json();

        $this->assertStringEndsWith('/me?fields='.urlencode('id,name,first_name'), $response->getEffectiveUrl());

        $this->assertEquals(array(
            'id' => '659664442',
            'name' => 'Adrien Brault',
            'first_name' => 'Adrien',
            'last_name' => 'Brault',
            'link' => 'http://www.facebook.com/Monsti',
            'username' => 'Monsti',
            'gender' => 'male',
            'timezone' => 1,
            'locale' => 'en_US',
            'verified' => true,
            'updated_time' => '2012-11-12T09:30:56+0000',
        ), $result);
    }
}
