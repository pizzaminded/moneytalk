<?php

namespace pizzaminded\MoneyTalkBundle\Payment;

use pizzaminded\MoneyTalkBundle\MoneyTalkableInterface;

/**
 * Class PaymentProcessor
 * @package pizzaminded\MoneyTalkBundle\Payment
 * @author pizzaminded <github.com/pizzaminded>
 */
class PaymentProcessor
{

    /**
     * @var MoneyTalkableInterface
     */
    protected $moneytalkable;

    /**
     * PaymentProcessor constructor.
     * @param MoneyTalkableInterface $moneytalkable
     */
    public function __construct(MoneyTalkableInterface $moneytalkable)
    {
        $this->moneytalkable = $moneytalkable;
    }

    /**
     * @return bool
     */
    public function isCleared(): bool
    {
        return $this->moneytalkable->getPaymentStatus() === Payment::STATUS_CLEARED;
    }

    /**
     * @return bool
     */
    public function isPending(): bool
    {
        return $this->moneytalkable->getPaymentStatus() === Payment::STATUS_PENDING;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return !($this-$this->isCleared() && $this->isPending());
    }

    /**
     * @return MoneyTalkableInterface
     */
    public function getEntity(): MoneyTalkableInterface
    {
        return $this->moneytalkable;
    }

}