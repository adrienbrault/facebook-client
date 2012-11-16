<?php

namespace Footcho\FacebookClient\Tests\Helper;

use Footcho\FacebookClient\Helper\AuthorizationHelper;

class AuthorizationHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestGetAuthorizationFromAccessToken
     */
    public function testGetAuthorizationFromAccessToken($input, $expectedResult)
    {
        $this->assertEquals($expectedResult, AuthorizationHelper::getAuthorizationFromAccessToken($input));
    }

    public function getTestGetAuthorizationFromAccessToken()
    {
        return array(
            array('efh6f', 'OAuth efh6f'),
            array('OAuth efh6f', 'OAuth efh6f'),
        );
    }
}
