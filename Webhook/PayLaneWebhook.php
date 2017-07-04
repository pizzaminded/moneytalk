<?php

namespace pizzaminded\MoneyTalkBundle\Webhook;

use pizzaminded\MoneytalkBundle\Entity\PayLane;
use pizzaminded\MoneytalkBundle\MoneytalkableInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PayLaneWebhook
 * @package pizzaminded\MoneyTalkBundle\Webhook
 */
class PayLaneWebhook implements WebhookInterface
{

    /**
     * @var string
     */
    protected $method;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var PayLane
     */
    protected $entity;

    /**
     * PayLaneWebhook constructor.
     */
    public function __construct()
    {
        $this->entity = new PayLane();
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function parseRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
       $this->method = strtoupper($method);

       return $this;
    }

    /**
     * @return MoneytalkableInterface
     */
    public function getEntity(): MoneytalkableInterface
    {
        return $this->entity;
    }
}