<?php

namespace Benjafield\Rackspace\Objects;

class Mailbox extends BaseObject
{
    /**
     * The list of forwarding addresses.
     *
     * @var array
     */
    public $emailForwardingAddressList = [];

    /**
     * Whether the vacation message is enabled.
     *
     * @var bool
     */
    public $enableVacationMessage;

    /**
     * Whether the mailbox is enabled.
     *
     * @var bool
     */
    public $enabled;

    /**
     * The name of the mailbox.
     *
     * @var string
     */
    public $name;

    /**
     * Whether forwarded mail should be saved.
     *
     * @var bool
     */
    public $saveForwardedMail;

    /**
     * The size of the mailbox in bytes.
     *
     * @var int
     */
    public $size;

    /**
     * The vacation message that has been set.
     *
     * @var string
     */
    public $vacationMessage;

    /**
     * The created datee of the mailbox.
     *
     * @var string
     */
    public $createdDate;

    /**
     * The current usage in bytes.
     *
     * @var int
     */
    public $currentUsage;

    /**
     * Flag indicating if the mailbox is visible in the Exchange Global Address List.
     *
     * @var bool
     */
    public $visibleInExchangeGAL;

    /**
     * Whether the mailbox is visible in the company directory.
     *
     * @var string
     */
    public $visibleInRackspaceEmailCompanyDirectory;

    /**
     * @var ContactInfo
     */
    public $contactInfo;
}