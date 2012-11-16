<?php

namespace Footcho\FacebookClient\Tests;

class FacebookClientTest extends \Guzzle\Tests\GuzzleTestCase
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

        $this->assertEquals('/me?fields=id,name,first_name', $response->getRequest()->getPath());

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
