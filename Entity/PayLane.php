<?php

namespace pizzaminded\MoneyTalkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use pizzaminded\MoneyTalkBundle\Payment\Payment;
use pizzaminded\MoneyTalkBundle\MoneyTalkableInterface;

/**
 * @ORM\Entity(repositoryClass="pizzaminded\PizzaCMSBundle\Repository\ArticleRepository")
 * @ORM\Table(name="moneytalk_paylane_webhook")
 */
class PayLane implements MoneyTalkableInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", name="status")
     * @var string
     */
    protected $status;

    /**
     * @ORM\Column(type="float", name="amount")
     * @var float
     */
    protected $amount;

    /**
     * @ORM\Column(type="string", name="currency")
     * @var string
     */
    protected $currency;

    /**
     * @ORM\Column(type="string", name="description")
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="string", name="hash")
     * @var string
     */
    protected $hash;

    /**
     * @ORM\Column(type="integer", name="id_sale", nullable=true)
     * @var int
     */
    protected $idSale;

    /**
     * @ORM\Column(type="integer", name="id_error", nullable=true)
     * @var int
     */
    protected $idError;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return PayLane
     */
    public function setStatus(string $status): PayLane
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return PayLane
     */
    public function setAmount(float $amount): PayLane
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return PayLane
     */
    public function setCurrency(string $currency): PayLane
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return PayLane
     */
    public function setDescription(string $description): PayLane
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return PayLane
     */
    public function setHash(string $hash): PayLane
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdSale()
    {
        return $this->idSale;
    }

    /**
     * @param int $idSale
     * @return PayLane
     */
    public function setIdSale(int $idSale): PayLane
    {
        $this->idSale = $idSale;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdError()
    {
        return $this->idError;
    }

    /**
     * @param int $idError
     */
    public function setIdError(int $idError)
    {
        $this->idError = $idError;
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPaymentStatus(): int
    {
        if(strtoupper($this->status) === 'CLEARED') {
            return Payment::STATUS_CLEARED;
        }

        return Payment::STATUS_PENDING;
    }
}