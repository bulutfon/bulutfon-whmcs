<?php
use Bulutfon\Libraries\Repository;

include __DIR__.'/../../../configuration.php';
include __DIR__.'/vendor/autoload.php';

$repository = new Repository();
echo "<pre>";
dd($repository->getKeys());



