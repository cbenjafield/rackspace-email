<?php

namespace Benjafield\Rackspace;

use Benjafield\Rackspace\Exceptions\RackspaceClientException;
use Benjafield\Rackspace\Resources\DomainResource;
use Benjafield\Rackspace\Resources\MailboxResource;
use Benjafield\Rackspace\Resources\AliasResource;
use Benjafield\Rackspace\Resources\CustomerResource;

class Rackspace
{
    /**
     * The Rackspace API key.
     *
     * @var string
     */
    protected static $key;

    /**
     * The Rackspace API secret.
     *
     * @var string
     */
    protected static $secret;

    /**
     * The Rackspace API endpoint.
     *
     * @var string
     */
    protected static $endpoint = 'https://api.emailsrvr.com';

    /**
     * The timeout interval.
     *
     * @var int
     */
    protected static $timeout = 200;

    /**
     * The GuzzleHttp client.
     *
     * @var Client
     */
    protected $client;

    /**
     * Initiate the library with a provided key and secret.
     *
     * @param  string|null  $key
     * @param  string|null  $secret
     * @return Rackspace
     */
    public static function init(string $key = null, string $secret = null): Rackspace
    {
        static::$key = $key;
        static::$secret = $secret;

        return new Rackspace;
    }

    /**
     * Initiate the library from an .env file with the correct keys.
     *
     * @param string $filePath
     * @param string $keyName
     * @param string $secretName
     * @return Rackspace
     */
    public static function fromEnvFile(string $filePath, string $keyName = 'RACKSPACE_KEY', string $secretName = 'RACKSPACE_SECRET'): Rackspace
    {
        $file = parse_ini_file($filePath);
        return static::init($file[$keyName] ?? null, $file[$secretName] ?? null);
    }

    /**
     * Create a new Rackspace instance.
     *
     * @return void
     * @throws RackspaceClientException
     */
    public function __construct()
    {
        $this->client = new Client(
            static::$key,
            static::$secret,
            static::$endpoint,
            static::$timeout
        );
    }

    /**
     * Create a new domain resource.
     *
     * @param  array  $attributes
     * @return DomainResource
     */
    public function domains(array $attributes = []): DomainResource
    {
        return new DomainResource($this->client, $attributes);
    }

    /**
     * Create a new mailbox resource.
     *
     * @param  array  $attributes
     * @return MailboxResource
     */
    public function mailboxes(array $attributes = []): MailboxResource
    {
        return new MailboxResource($this->client, $attributes);
    }

    /**
     * Create a new alias resource.
     *
     * @param  array  $attributes
     * @return AliasResource
     */
    public function aliases(array $attributes = []): AliasResource
    {
        return new AliasResource($this->client, $attributes);
    }

    /**
     * Create a new customer resource.
     *
     * @return CustomerResource
     */
    public function customers(): CustomerResource
    {
        return new CustomerResource($this->client);
    }
}