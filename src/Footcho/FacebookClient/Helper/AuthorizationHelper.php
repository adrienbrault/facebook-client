<?php

namespace Footcho\FacebookClient\Helper;

class AuthorizationHelper
{
    public static function getAuthorizationFromAccessToken($accessToken)
    {
        if (0 === strpos($accessToken, 'OAuth')) {
            return $accessToken;
        }

        return sprintf('OAuth %s', $accessToken);
    }
}
