<?php
require '../vendor/autoload.php';
require 'controllers/HomeController.php';
Flight::route('GET /', function () {
    (new HomeController())->index();
});

Flight::route('POST /', function () {
    (new HomeController())->getListMovie();
});

Flight::start();
