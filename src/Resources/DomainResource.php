<?php

namespace Benjafield\Rackspace\Resources;

use Benjafield\Rackspace\Objects\Domain;
use GuzzleHttp\Exception\GuzzleException;

class DomainResource extends BaseResource
{
    /**
     * Return all domains belonging to a customer.
     *
     * @param int $customerId
     * @return array
     * @throws GuzzleException
     */
    public function all(int $customerId): array
    {
        $response = $this->client->getResponse("/customers/$customerId/domains");

        return ($response->domains ?? false)
            ? $response['domains']
            : [];
    }

    /**
     * Return an individual domain.
     *
     * @param int $customerId
     * @param string $domain
     * @return Domain|null
     * @throws GuzzleException
     */
    public function find(int $customerId, string $domain): ?Domain
    {
        $response = $this->client->getResponse("/customers/$customerId/domains/$domain");

        return ($response ?? false)
            ? new Domain($response)
            : null;
    }
}