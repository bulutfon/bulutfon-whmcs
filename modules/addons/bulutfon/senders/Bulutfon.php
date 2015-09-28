<?php
 namespace Bulutfon\senders;

 use Bulutfon\Libraries\NotificationInterface;

 class Bulutfon implements NotificationInterface {

     protected $number;

     public function setNumber($number)
     {
         $this->number = $number;
     }

     public function send($message)
     {
         // TODO: Implement send() method.
     }
 }