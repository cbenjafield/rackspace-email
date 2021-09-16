<?php

namespace Benjafield\Rackspace;

use DateTime;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Benjafield\Rackspace\Exceptions\RackspaceClientException;

class Client
{
    /**
     * The API key
     *
     * @var string
     */
    protected $key;

    /**
     * The API secret
     *
     * @var string
     */
    protected $secret;

    /**
     * The API endpoint.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * The API timeout.
     *
     * @var int
     */
    protected $timeout;

    /**
     * The Guzzle HTTP client.
     *
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Create a new Rackspace Client instance.
     *
     * @param string|null $key
     * @param string|null $secret
     * @param string|null $endpoint
     * @param int $timeout
     * @throws RackspaceClientException
     */
    public function __construct(string $key = null, string $secret = null, string $endpoint = null, int $timeout = 200)
    {
        if(empty($key)) throw new RackspaceClientException('The API key is required');
        if(empty($secret)) throw new RackspaceClientException('The API secret is required');
        if(empty($endpoint)) throw new RackspaceClientException('The API endpoint is required');

        $this->key = $key;
        $this->secret = $secret;
        $this->endpoint = $endpoint;
        $this->timeout = $timeout;

        $this->client = new GuzzleClient([
            'base_uri' => $this->endpoint,
            'timeout' => $this->timeout,
            'headers' => [
                'User-Agent' => $this->userAgent(),
                'X-Api-Signature' => $this->apiSignature(),
                'Accept' => 'application/json',
            ]
        ]);
    }

    /**
     * Make the Rackspace API signature.
     *
     * @return string
     */
    protected function apiSignature(): string
    {
        $timestamp = (new DateTime())->format('YmdHis');
        return "$this->key:$timestamp:{$this->hash($timestamp)}";
    }

    /**
     * Make the API hash into Base 64.
     *
     * @param  string  $timestamp
     * @return string
     */
    protected function hash(string $timestamp): string
    {
        return base64_encode(
            sha1(
                $this->key .
                $this->userAgent() .
                $timestamp .
                $this->secret,
                true
            )
        );
    }

    /**
     * Return the User Agent string to send to the API.
     *
     * @return string
     */
    protected function userAgent(): string
    {
        return 'Benjafield\\Rackspace';
    }

    /**
     * Get the response and return the result object.
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function getResponse(
        string $uri = null,
        string $method = 'GET',
        array $data = [],
        array $options = []
    ) {
        if(! empty($data)) {
            $options['json'] = $data;
        }

        $request = $this->client->request(
            $method,
            $uri,
            $options
        );

        return json_decode($request->getBody()->getContents(), true);
    }
}