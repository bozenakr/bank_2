<?php

use Bank2\App;

define('URL', 'http://bank.lt/');

require __DIR__ . '/../vendor/autoload.php';

$response = App::start();

echo $response;