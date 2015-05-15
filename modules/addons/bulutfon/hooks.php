<?php
/*error_reporting(E_ALL);
ini_set("display_errors", 1);*/
 function bulutfonClientAreaOutput($vars) {

     $html_return = array();
     $html_return = "<div style='min-height:200px;display:none;'><img src='../modules/addons/bulutfon/assets/img/loader.gif' class='bulutfon-loader'/></div>";
     return $html_return;
 }
 add_hook("AdminAreaClientSummaryPage",1,"bulutfonClientAreaOutput");


function header_output(){
    $head_return = '
        <link href="../modules/addons/bulutfon/assets/css/bulutfon.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../modules/addons/bulutfon/assets/js/bulutfon.js"></script>';
    return $head_return;
}

add_hook("AdminAreaHeadOutput",2,"header_output");