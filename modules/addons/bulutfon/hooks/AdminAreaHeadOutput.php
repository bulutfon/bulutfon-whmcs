<?php
if(!isset($AdminAreaHeadOutput)) {
    $AdminAreaHeadOutput = function($args){
       $head = '<link href="../modules/addons/bulutfon/assets/css/bulutfon.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="../modules/addons/bulutfon/assets/js/bulutfon.js"></script>';
       return $head;
    };
}
return $AdminAreaHeadOutput;