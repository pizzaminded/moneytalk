<?php

namespace pizzaminded\MoneyTalk;


/**
 * Interface MoneyTalkableInterface
 * @package pizzaminded\MoneyTalk
 * @author pizzaminded <miki@appvende.net>
 */
interface MoneyTalkableInterface
{
    /**
     * @return mixed
     */
    public function getPaymentStatus();

}