<?php

namespace pizzaminded\MoneyTalkBundle\Webhook;

use pizzaminded\MoneyTalkBundle\Entity\PayLane;
use pizzaminded\MoneyTalkBundle\Exception\ParserException;
use pizzaminded\MoneyTalkBundle\MoneyTalkableInterface;
use pizzaminded\MoneyTalkBundle\Payment\PaymentProcessor;
use Symfony\Component\HttpFoundation\ParameterBag;
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
     * @var bool
     */
    protected $isParsed;

    /**
     * PayLaneWebhook constructor.
     */
    public function __construct()
    {
        $this->entity = new PayLane();
        $this->isParsed = false;
    }

    /**
     * @param Request $request
     * @return $this
     * @throws ParserException
     */
    public function parseRequest(Request $request)
    {
        $this->request = $request;

        if ($this->method === null) {
            throw new ParserException('Method is not set.');
        }

        /** @var $parameterBag ParameterBag */
        if (strtoupper($this->method) === 'GET') {
            $parameterBag = $this->request->query;
        } elseif (strtoupper($this->method) === 'POST') {
            $parameterBag = $this->request->request;
        }

        //if these fields are missing, we can assume that is not a correct request
        if(!($parameterBag->has('status') && $parameterBag->has('hash'))) {
            throw new ParserException('Unable to parse request.');
        }

        $status = $parameterBag->get('status');
        $currency = $parameterBag->get('currency');
        $description = $parameterBag->get('description');
        $amount = $parameterBag->get('amount');
        $hash = $parameterBag->get('hash');
        $idSale = $parameterBag->get('id_sale');
        $idError = $parameterBag->get('id_error');

        $this->entity->setStatus($status)
            ->setCurrency($currency)
            ->setDescription($description)
            ->setAmount($amount)
            ->setHash($hash)
            ->setIdSale($idSale)
            ->setIdError($idError);

        $this->isParsed = true;

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

    /**
     * @return PaymentProcessor
     * @throws \pizzaminded\MoneyTalkBundle\Exception\ParserException
     */
    public function getPaymentProcessor(): PaymentProcessor
    {
        if($this->isParsed) {
            return new PaymentProcessor($this->entity);
        }

        throw new ParserException('You can\'t invoke a payment processor if payment is not processed');
    }

}