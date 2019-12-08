<?php

use Notifier\Notifier;

session_start();
define ('ROOT', __DIR__);
require_once (ROOT . '/vendor/autoload.php');

$app = new Notifier();