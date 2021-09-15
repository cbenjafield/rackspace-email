<?php

namespace Tests;

use Benjafield\Rackspace\Rackspace;
use PHPUnit\Framework\TestCase;
use Benjafield\Rackspace\Resources\DomainResource;
use Benjafield\Rackspace\Resources\AliasResource;
use Benjafield\Rackspace\Resources\MailboxResource;
use Benjafield\Rackspace\Resources\CustomerResource;

class ResourceTest extends TestCase
{
    protected $rackspace;

    protected function setUp(): void
    {
        $this->rackspace = Rackspace::init('test_key', 'test_secret');
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
}