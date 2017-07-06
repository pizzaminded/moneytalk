<?php

namespace pizzaminded\MoneyTalkBundle\Payment;

use Doctrine\ORM\EntityManager;
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
     * @var EntityManager
     */
    protected $em;

    /**
     * PaymentProcessor constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
//        $this->moneytalkable = $moneytalkable;
        $this->em = $em;
    }

    public function setEntity(MoneyTalkableInterface $moneyTalkable)
    {
        $this->moneytalkable = $moneyTalkable;
        return $this;
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

    public function saveEntity()
    {
        $this->em->persist($this->moneytalkable);
        $this->em->flush();

        return $this;
    }

}