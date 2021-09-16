<?php

namespace Benjafield\Rackspace\Objects;

class Customer extends BaseObject
{
    /**
     * The name of the customer account.
     *
     * @var string
     */
    public $name;

    /**
     * The customer's account number.
     *
     * @var int
     */
    public $accountNumber;

    /**
     * The customer's reference number.
     *
     * @var int
     */
    public $referenceNumber;

    /**
     * The first line of the customer's address.
     *
     * @var string
     */
    public $addressLine1;

    /**
     * The second line of the customer's address.
     *
     * @var string
     */
    public $addressLine2;

    /**
     * The customer's city/town.
     *
     * @var string
     */
    public $city;

    /**
     * The customer's state/county.
     *
     * @var string
     */
    public $state;

    /**
     * The customer's zip/postcode.
     *
     * @var string
     */
    public $zip;

    /**
     * The customer's country.
     *
     * @var string
     */
    public $country;

    /**
     * The customer's phone.
     *
     * @var string
     */
    public $phone;

    /**
     * The customer's email address.
     *
     * @var string
     */
    public $email;
}