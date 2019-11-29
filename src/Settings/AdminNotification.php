<?php

namespace Settings;

class AdminNotification
{
    private static $admin_settings;


    public static function dataHasWrongField(array $fields)
    {
        self::$admin_settings = include(__DIR__ . '/admin_settings.php');
        $fields = implode(', ', $fields);
        self::$admin_settings['text'] = str_replace('%wrong_fields%', $fields, self::$admin_settings['text_wrong_fields']);
        mail(self::$admin_settings['mail'], self::$admin_settings['theme'], self::$admin_settings['text_wrong_fields']);
    }

    public static function sendData()
    {
        mail(self::$admin_settings['mail'], self::$admin_settings['theme'], self::$admin_settings['text_send_data']);
    }
}