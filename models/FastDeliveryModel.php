<?php

namespace models;


class FastDeliveryModel
{
    private float $_price;
    private int $_period;
    private string $_error;

    public function __construct(float $price, int $period, string $error)
    {
        $this->_price = $price;
        $this->_period = $period;
        $this->_error = $error;
        if (date("H") >= '18') {
            $this->_period++;
        }
    }


    public function getPrice(): Price
    {
        $price = $this->_price;

        $interval = \DateInterval::createFromDateString($this->_period . ' days');
        $date = date_add(date_create(date('Y-m-d')), $interval)->format('Y-m-d');

        $error = $this->_error;

        return new Price($price,$date ,$error);
    }
}
