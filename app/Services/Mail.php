<?php
namespace App\Services;


use App\Config;
use Mailgun\Mailgun;


/**
 * Class Mail
 * @package App\Services
 */
class Mail
{
     /**
      * Send a message
      *
      * @param string $to Recipient
      * @param string $subject Subject
      * @param string $text Text-only content of the message
      * @param string $html HTML content of the message
      *
      * @return mixed
      */
      public static function send($to, $subject, $text, $html)
      {
           $msg = new Mailgun(Config::MAILGUN_API_KEY); // key-api-example
           $domain = Config::MAILGUN_DOMAIN; // example.com

           $msg->sendMessage($domain, [
                 'from' => '', // 'jeanyao@ymail.com/bob@example.com'
                 'to' => $to, // sally@example.com
                 'subject' => $subject, // The PHP SDK is awesoe!
                 'text' => $text, // It is so simple to send a message.
                 'html' => $html, // HTML version
           ]);
      }

}