<?php

namespace Settings;

use Mail;

class AdminNotification
{
    private static $admin_settings;

    public static function dataHasWrongField(array $fields)
    {
        self::$admin_settings = include(__DIR__ . '/admin_settings.php');
        $fields = implode(', ', $fields);
        self::$admin_settings['text'] = str_replace('%wrong_fields%', $fields, self::$admin_settings['text_wrong_fields']);
        new Mail($_ENV['SELF_MAIL'], $_ENV['ADMIN_MAIL'], self::$admin_settings['theme'], self::$admin_settings['text_wrong_fields']);
    }

    public static function sendData()
    {
        new Mail($_ENV['SELF_MAIL'], $_ENV['ADMIN_MAIL'], self::$admin_settings['theme'], self::$admin_settings['text_send_data']);
    }
}