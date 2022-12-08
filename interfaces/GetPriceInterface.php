<?php

namespace interfaces;

use models\Goods;
use models\Price;

interface GetPriceInterface
{
    public static function getPrice(Goods $goods): Price;
}