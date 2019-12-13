<?php

namespace Logs;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LogWriter
{
    private $logger;

    public function __construct($logger_name, $log_data)
    {
        $this->logger = new Logger($logger_name);
        $this->logger->pushHandler(new StreamHandler(dirname(__FILE__, 1) . '/var/logs/logs.txt', Logger::INFO));
        $this->writeLog($log_data);
    }

    protected function writeLog($log_data)
    {
        $this->logger->pushHandler($log_data);
    }
}