<?php
$hook = array(
    'hook' => 'AdminAreaClientSummaryPage',
    'function' => 'bulutfonClientAreaOutput',
    'type' => 'admin',
    'extra' => ''
);
if(!function_exists('bulutfonClientAreaOutput')){
    function bulutfonClientAreaOutput($vars) {
        $html_return = array();
        $html_return = "<div style='min-height:200px;display:none;'><img src='../modules/addons/bulutfon/assets/img/loader.gif' class='bulutfon-loader'/></div>";
        return $html_return;
    }
}

return $hook;
