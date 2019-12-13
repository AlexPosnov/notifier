<?php

namespace Mail;

use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Logs\LogWriter;

class Mail
{
    private $email;

    public function __construct($from, $to, $theme, $text)
    {
        $transport = new GmailSmtpTransport('user', 'pass');
        $mailer = new Mailer($transport);
        $mailer->send($this->createMail($from, $to, $theme, $text));
        $date = new \DateTime();
        new LogWriter('info', sprintf('Mail from: %s was sent to: %s with theme: %s and text %s in %s', $from, $to, $theme, $text, $date->format('Y-m-d H:i:s')));
    }

    private function createMail($from, $to, $theme, $text)
    {
        $this->email = (new Email())
            ->from($from)
            ->to($to)
            ->subject($theme)
            ->text($text);

        return $this->email;
    }
}