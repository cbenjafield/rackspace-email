<?php

namespace Benjafield\Rackspace\Resources;

use Benjafield\Rackspace\Objects\Customer;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

class CustomerResource extends BaseResource
{
    /**
     * Return a list of all customer accounts.
     *
     * @param  array  $data
     * @return object
     * @throws GuzzleException
     */
    public function all(array $data = []): object
    {
        return $this->listing(
            'customers',
            $this->client->getResponse("/customers", "GET", $data),
            function ($customer) {
                return new Customer($customer);
            }
        );
    }

    /**
     * Return an individual customer's details.
     *
     * @param int $customerId
     * @return Customer|null
     * @throws GuzzleException
     */
    public function find(int $customerId): ?Customer
    {
        $response = $this->client->getResponse("/customers/$customerId");

        return ($response ?? false)
            ? new Customer($response)
            : null;
    }
}