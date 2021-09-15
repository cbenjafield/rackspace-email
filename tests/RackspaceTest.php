<?php

namespace Tests;

use Benjafield\Rackspace\Exceptions\RackspaceClientException;
use PHPUnit\Framework\TestCase;
use Benjafield\Rackspace\Rackspace;

class RackspaceTest extends TestCase
{
    /**
     * The test env file path.
     *
     * @var string
     */
    protected $envFile = __DIR__ . '/.env';

    /** @test */
    function it_has_test_env_file()
    {
        $this->assertEquals(true, file_exists($this->envFile));
    }

    /** @test */
    function it_parses_test_env_file()
    {
        $rackspace = Rackspace::fromEnvFile($this->envFile);
        $this->assertInstanceOf(Rackspace::class, $rackspace);
    }

    /** @test */
    function it_has_the_correct_class_type()
    {
        $rackspace = Rackspace::init('test_key', 'test_secret');
        $this->assertInstanceOf(Rackspace::class, $rackspace);
    }

    /** @test */
    function it_throws_an_exception_when_not_using_a_key()
    {
        $this->expectException(RackspaceClientException::class);
        Rackspace::init('', 'test_secret');
    }

    /** @test */
    function it_throws_an_exception_when_not_using_a_secret()
    {
        $this->expectException(RackspaceClientException::class);
        Rackspace::init('test_key', '');
    }
}