<?php

namespace pizzaminded\MoneyTalkBundle\Webhook;

use pizzaminded\MoneytalkBundle\MoneytalkableInterface;
use pizzaminded\MoneytalkBundle\Payment\PaymentProcessor;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface WebhookInterface
 * @package pizzaminded\MoneyTalkBundle\Webhook
 * @author pizzaminded <github.com/pizzaminded>
 */
interface WebhookInterface
{
    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method);

    /**
     * @param Request $request
     * @return $this
     */
    public function parseRequest(Request $request);

    /**
     * @return MoneytalkableInterface
     */
    public function getEntity(): MoneytalkableInterface;

    /**
     * @return PaymentProcessor
     */
    public function getPaymentProcessor(): PaymentProcessor;
}