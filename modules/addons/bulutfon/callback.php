<?php
use Bulutfon\Libraries\Provider;
use Bulutfon\Libraries\Repository;
require "init.php";
$provider = new Provider(
    new Repository(),
    $customadminpath
);
$provider->init();