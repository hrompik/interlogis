<?php

use controllers\MainController;

include '../controllers/MainController.php';
include '../interfaces/GetPriceInterface.php';
include '../models/FastDelivery.php';
include '../models/FastDeliveryModel.php';
include '../models/Goods.php';
include '../models/Price.php';
include '../models/SlowDelivery.php';
include '../models/SlowDeliveryModel.php';


$controller = new MainController();

if ($_GET['get'] === "price") {
    echo '<pre>';
    echo $controller->getPrice($_POST);
    echo '</pre>';
    echo '<a href="index.php">Вернуться</a>';
}else{
    echo $controller->actionIndex();
}

