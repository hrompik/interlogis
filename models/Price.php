<?php

namespace models;
class Price
{
    private int $_price;
    private string $_date;
    private string $_error;

    public function __construct(float $price, string $date, string $error)
    {
        $this->_price = $price;
        $this->_date = $date;
        $this->_error = $error;
    }

    public function getAttributes(): array
    {
        return [
            'price' => $this->_price,
            'date' => $this->_date,
            'error' => $this->_error,
        ];
    }
}