<?php

namespace pizzaminded\MoneytalkBundleeeeeee\Payment;


use pizzaminded\MoneytalkBundle\MoneytalkableInterface;

class PaymentProcessor
{

    protected $moneytalkable;

    public function __construct(MoneytalkableInterface $moneytalkable)
    {
        $this->moneytalkable = $moneytalkable;
    }




}