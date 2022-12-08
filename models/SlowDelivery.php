<?php

namespace models;

use interfaces\GetPriceInterface;

class SlowDelivery implements GetPriceInterface
{
    public static function getPrice(Goods $goods): Price
    {
        $model = self::_request($goods);
        return $model->getPrice();
    }

    private static function _request(Goods $goods): SlowDeliveryModel
    {
        //Эмулируем получение данные от сервера по $goods
        // $goods->getAttributes()

        $coefficient = rand(100, 500) / 100;
        $interval = \DateInterval::createFromDateString(rand(1, 50) . ' days');
        $date = date_add(date_create(date('Y-m-d')), $interval)->format('Y-m-d');
        $error = "";

        return new SlowDeliveryModel($coefficient, $date, $error);
    }
}
