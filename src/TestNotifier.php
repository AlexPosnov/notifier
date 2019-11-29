<?php

namespace Notifier;

class TestNotifier
{
    public function __construct()
    {
        $_REQUEST['email_notifications'] = [
            'name' => 'Брюс',
            'surname' => 'Уиллис',
            'middlename' => 'Пантелеевич',
            'mail' => 'BrusForever@mail.ru',
            'mail_text' => 'Уважаемый Брюс Уиллис, ваше встреча забронирована на 15.30 27.12.2027 г.',
        ];
    }
}