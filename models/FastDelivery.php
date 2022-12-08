<?php

namespace models;

use interfaces\GetPriceInterface;

class FastDelivery implements GetPriceInterface
{
    public static function getPrice(Goods $goods): Price
    {
        $model = self::_request($goods);
        return $model->getPrice();
    }

    private static function _request(Goods $goods): FastDeliveryModel
    {
        //Эмулируем получение данные от сервера по $goods
        // $goods->getAttributes()
        $price = rand(1000, 1000000) / 100;
        $period = rand(1, 100);
        $error = "";

        return new FastDeliveryModel($price,$period,$error);
    }
}
