<?php

namespace pizzaminded\MoneyTalkBundle\Payment;


use pizzaminded\MoneyTalkBundle\MoneyTalkableInterface;

class PaymentProcessor
{

    protected $moneytalkable;

    public function __construct(MoneyTalkableInterface $moneytalkable)
    {
        $this->moneytalkable = $moneytalkable;
    }




}