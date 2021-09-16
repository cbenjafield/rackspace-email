<?php

namespace Benjafield\Rackspace\Resources;

use Benjafield\Rackspace\Objects\Mailbox;
use GuzzleHttp\Exception\GuzzleException;

class MailboxResource extends BaseResource
{
    /**
     * Return a list of Rackspace mailboxes.
     *
     * @param  array  $data
     * @return object
     * @throws GuzzleException
     */
    public function all(array $data = []): object
    {
        return $this->listing(
            'rsMailboxes',
            $this->client->getResponse("/customers/$this->customerId/domains/$this->domain/rs/mailboxes", "GET", $data),
            function ($mailbox) {
                return new Mailbox($mailbox);
            }
        );
    }

    /**
     * Return an individual mailbox.
     *
     * @param  string  $name
     * @return Mailbox|null
     * @throws GuzzleException
     */
    public function find(string $name): ?Mailbox
    {
        $response = $this->client->getResponse("/customers/$this->customerId/domains/$this->domain/rs/mailboxes/$name");

        return ($response ?? false)
            ? new Mailbox($response)
            : null;
    }
}