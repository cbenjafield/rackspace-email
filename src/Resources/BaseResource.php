<?php

namespace Benjafield\Rackspace\Resources;

use Benjafield\Rackspace\Client;

class BaseResource
{
    /**
     * The Rackspace client.
     *
     * @var Client
     */
    protected $client;

    /**
     * Create a new resource instance.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}