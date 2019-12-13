<?php

namespace Notifier;

use Settings\AdminNotification;
use Symfony\Component\Dotenv\Dotenv;
use Mail\Mail;
use Logs\LogWriter;

class Notifier

{
    private $user_data = ['name' => '', 'surname' => '', 'middlename' => '', 'theme' => '', 'from' => '', 'to' => '', 'mail_text' => ''];

    public function __construct()
    {
        $app_vars = new Dotenv();
        $app_vars->load(dirname(__DIR__, 1) . '.env');
        $this->testCase(); //delete
        $this->checkData();
        $this->sendData();
    }

    protected function checkData()
    {
        $wrong_data = [];
        foreach ($_REQUEST as $field => $value) {
            if (empty($_REQUEST[$field])) {
                $wrong_data[] = $field;
            } else {
                $user_data[$field] = $value;
            }
        }
        if (!empty($wrong_data)) {
            AdminNotification::dataHasWrongField($wrong_data);
            exit;
        }
    }

    private function testCase() //delete
    {
          $_REQUEST['email_notifications'] = [
            'name' => 'Брюс',
            'surname' => 'Уиллис',
            'middlename' => 'Пантелеевич',
            'theme' => 'Совещание',
             'from' => 'Exmaple@rxample.ru',
            'to' => 'BrusForever@mail.ru',
            'mail_text' => 'Уважаемый Брюс Уиллис, ваше встреча забронирована на 15.30 27.12.2027 г.',
        ];
    }

    protected function sendData()
    {
        new Mail($this->user_data['from'], $this->user_data['to'], $this->user_data['theme'], $this->user_data['mail_text']);
        AdminNotification::sendData();
    }
}