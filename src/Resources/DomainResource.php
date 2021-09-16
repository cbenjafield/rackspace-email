<?php

namespace Benjafield\Rackspace\Resources;

use Benjafield\Rackspace\Objects\Domain;
use GuzzleHttp\Exception\GuzzleException;

class DomainResource extends BaseResource
{
    /**
     * Return all domains belonging to a customer.
     *
     * @return array
     * @throws GuzzleException
     */
    public function all(): array
    {
        $response = $this->client->getResponse("/customers/$this->customerId/domains");

        return ($response->domains ?? false)
            ? $response['domains']
            : [];
    }

    /**
     * Return an individual domain.
     *
     * @param  string  $domain
     * @return Domain|null
     * @throws GuzzleException
     */
    public function find(string $domain): ?Domain
    {
        $response = $this->client->getResponse("/customers/$this->customerId/domains/$domain");

        return ($response ?? false)
            ? new Domain($response)
            : null;
    }
}