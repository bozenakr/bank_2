<?php

use Bank2\App;

define('URL', 'http://bank2.lt/');

require __DIR__ . '/../vendor/autoload.php';

$response = App::start();

echo $response;