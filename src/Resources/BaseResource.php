<?php

namespace Benjafield\Rackspace\Resources;

use Benjafield\Rackspace\Client;
use stdClass;
use Closure;

class BaseResource
{
    /**
     * The Rackspace client.
     *
     * @var Client
     */
    protected $client;

    /**
     * The customer ID to use with this resource.
     *
     * @var int|null
     */
    protected $customerId;

    /**
     * The domain to use with this resource.
     *
     * @var string|null
     */
    protected $domain;

    /**
     * Create a new resource instance.
     *
     * @param  Client  $client
     * @param  array  $attributes
     */
    public function __construct(Client $client, array $attributes = [])
    {
        $this->client = $client;

        foreach ($attributes as $key => $value) {
            if(property_exists($this, $key)) $this->$key = $value;
        }
    }

    /**
     * Return the listing representation of a result.
     *
     * @param string $key
     * @param array $response
     * @param Closure|null $callback
     * @return object
     */
    public function listing(string $key, array $response = [], Closure $callback = null): object
    {
        $result = new stdClass;
        $result->total = $response['total'] ?? 0;
        $result->offset = $response['offset'] ?? 0;
        $result->size = $response['size'] ?? 0;
        $result->customers = array_map($callback, $response[$key]);

        return $result;
    }
}