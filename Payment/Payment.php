<?php

namespace pizzaminded\MoneyTalkBundle\Payment;


/**
 * Class Payment
 * @package pizzaminded\MoneyTalkBundle\Payment
 * @author pizzaminded <github.com/pizzaminded>
 */
class Payment
{
    /**
     * Transaction cleared, payment operator received confirmation from bank
     * @var int
     */
    const STATUS_CLEARED = 1;

    /**
     * Transaction confirmed, waiting for confirmation
     * @var int
     */
    const STATUS_PENDING = 2;

    /**
     * An error occured during the transaction
     * @var int
     */
    const STATUS_ERROR = 3;
}