<?php

namespace Footcho\FacebookClient;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Common\Collection;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class FacebookClient extends Client
{
    /**
     * {@inheritdoc}
     *
     * @return static
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => 'https://graph.facebook.com/',
        );
        $config = Collection::fromConfig($config, $default, array());

        $client = new static($config->get('base_url'), $config);

        $description = ServiceDescription::factory(__DIR__.'/Resources/client.json');
        $client->setDescription($description);

        return $client;
    }

    public function getObject($id, $commandArguments)
    {
        return parent::getObject(array_merge(array(
            'id' => $id
        ), $commandArguments));
    }
}
