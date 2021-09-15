<?php

namespace Benjafield\Rackspace\Objects;

class Domain extends BaseObject
{
    /**
     * The domain name.
     *
     * @var string
     */
    public $name;

    /**
     * The account number the domain belongs to.
     *
     * @var int
     */
    public $accountNumber;

    /**
     * The domain service type.
     *
     * @var string
     */
    public $serviceType;

    /**
     * The Exchange base mailbox size.
     *
     * @var int
     */
    public $exchangeBaseMailboxSize;

    /**
     * Used Exchange service.
     *
     * @var int
     */
    public $exchangeUsedStorage;

    /**
     * Total Exchange storage.
     *
     * @var int
     */
    public $exchangeTotalStorage;

    /**
     * Exchange extra storage size.
     *
     * @var int
     */
    public $exchangeExtraStorage;

    /**
     * Maximum number of mailboxes allowed on the Exchange service.
     *
     * @var int
     */
    public $exchangeMaxNumMailboxes;

    /**
     * Rackspace base mailbox size.
     *
     * @var int
     */
    public $rsEmailBaseMailboxSize;

    /**
     * Rackspace maximum number of mailboxes.
     *
     * @var int
     */
    public $rsEmailMaxNumberMailboxes;

    /**
     * Rackspace extra storage size.
     *
     * @var int
     */
    public $rsEmailExtraStorage;

    /**
     * Rackspace used storage.
     *
     * @var int
     */
    public $rsEmailUsedStorage;

    /**
     * Whether the archiving service is enabled.
     *
     * @var bool
     */
    public $archivingServiceEnabled;

    /**
     * Whether public folders are enabled.
     *
     * @var bool
     */
    public $publicFoldersEnabled;

    /**
     * Whether the BlackBerry mobile service is enabled.
     *
     * @var bool
     */
    public $blackBerryMobileServiceEnabled;

    /**
     * The number of BlackBerry mobile licences.
     *
     * @var int
     */
    public $blackBerryLicenses;

    /**
     * Whether the Active Sync mobile service is enabled.
     *
     * @var bool
     */
    public $activeSyncMobileServiceEnabled;

    /**
     * The number of Active Sync licences.
     *
     * @var int
     */
    public $activeSyncLicenses;

    /**
     * Aliases of this domain.
     *
     * @var array
     */
    public $aliases = [];
}