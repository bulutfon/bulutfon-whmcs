<?php
namespace Bulutfon\Libraries;

interface NotificationInterface {

    public function setNumber($number);

    public function send($message);

}