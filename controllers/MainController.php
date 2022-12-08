<?php

namespace controllers;

use models\FastDelivery;
use models\Goods;
use models\SlowDelivery;

class MainController
{
    public function getPrice(array $params)
    {
        $goods = new Goods();
        $goods->load($params);
        if ($goods->validate()) {
            $prices = [];
            $prices['SlowDelivery'] = SlowDelivery::getPrice($goods)->getAttributes();
            $prices['FastDelivery'] = FastDelivery::getPrice($goods)->getAttributes();
            return json_encode($prices, JSON_PRETTY_PRINT);
        } else {
            return $goods->getError();
        }

    }

    public function actionIndex()
    {
        return '
        <html lang="ru">
        <head>
            <title>Просчет доставки</title>
        </head>
        <body>
        <form action="index.php?get=price" method="post">
            <label for="sourceKladr">Склад отправления</label>
            <input id="sourceKladr" type="text" name="sourceKladr"><br>
        
            <label for="targetKladr">Склад Получения</label>
            <input id="targetKladr" type="text" name="targetKladr"><br>
        
            <label for="weight">Вес</label>
            <input id="weight" type="text" name="weight"><br>
        
            <button type="submit">Просчитать</button>
        </form>
        </body>
        </html>';
    }
}
