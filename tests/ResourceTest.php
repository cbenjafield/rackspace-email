<?php

namespace Tests;

use Benjafield\Rackspace\Objects\Customer;
use Benjafield\Rackspace\Objects\Domain;
use Benjafield\Rackspace\Rackspace;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use Benjafield\Rackspace\Resources\DomainResource;
use Benjafield\Rackspace\Resources\AliasResource;
use Benjafield\Rackspace\Resources\MailboxResource;
use Benjafield\Rackspace\Resources\CustomerResource;

class ResourceTest extends TestCase
{
    protected $rackspace;
    protected $customerId = 12345678;
    protected $domain = 'example.com';

    protected function setUp(): void
    {
        $this->rackspace = Rackspace::fromEnvFile(__DIR__ . '/.env');
    }

    /** @test */
    function it_has_domains()
    {
        $this->assertInstanceOf(DomainResource::class, $this->rackspace->domains());
    }

    /** @test */
    function it_has_aliases()
    {
        $this->assertInstanceOf(AliasResource::class, $this->rackspace->aliases());
    }

    /** @test */
    function it_has_mailboxes()
    {
        $this->assertInstanceOf(MailboxResource::class, $this->rackspace->mailboxes());
    }

    /** @test */
    function it_has_customers()
    {
        $this->assertInstanceOf(CustomerResource::class, $this->rackspace->customers());
    }

    /**
     * @test
     * @throws GuzzleException
     */
    function it_returns_an_array_of_domains()
    {
        $this->assertTrue(
            is_array(
                $this->rackspace
                    ->domains([
                        'customerId' => $this->customerId,
                    ])
                    ->all()
            )
        );
    }

    /**
     * @test
     * @throws GuzzleException
     */
    function it_returns_an_individual_domain()
    {
        $this->assertInstanceOf(
            Domain::class,
            $this->rackspace
                ->domains([
                    'customerId' => $this->customerId,
                ])
                ->find($this->domain)
        );
    }

    /**
     * @test
     * @throws GuzzleException
     */
    function it_returns_a_list_of_customers()
    {
        $this->assertTrue(
            is_object(
                $this->rackspace
                    ->customers()
                    ->all()
            )
        );
    }

    /**
     * @test
     * @throws GuzzleException
     */
    function it_returns_a_single_customer()
    {
        $this->assertInstanceOf(
            Customer::class,
            $this->rackspace
                ->customers()
                ->find($this->customerId)
        );
    }

    /**
     * @test
     * @throws GuzzleException
     */
    function it_returns_a_list_of_mailboxes()
    {
        $this->assertTrue(
            is_object(
                $this->rackspace
                    ->mailboxes([
                        'customerId' => $this->customerId,
                        'domain' => $this->domain,
                    ])
                    ->all()
            )
        );
    }
}