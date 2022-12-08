<?php

namespace models;


class SlowDeliveryModel
{
    private float $_coefficient;
    private string $_date;
    private string $_error;

    private float $_baseCost = 150;

    public function __construct(float $coefficient, string $date, string $error)
    {
        $this->_coefficient = $coefficient;
        $this->_date = $date;
        $this->_error = $error;
    }

    public function getPrice(): Price
    {
        $price = $this->_coefficient * $this->_baseCost;
        $error = $this->_error;
        $date = $this->_date;
        return new Price($price, $date, $error);
    }
}
