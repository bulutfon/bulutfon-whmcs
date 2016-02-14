<?php
if (!isset($AdminAreaClientSummaryPage)) {
    $AdminAreaClientSummaryPage = function ($args) use ($hooks,$sender,$log) {
        //$head = "<div style='min-height:200px;display:none;'><img src='../modules/addons/bulutfon/assets/img/loader.gif' class='bulutfon-loader'/></div>";
        //return $head;
        $log->addError('Admin Head');
    };
}
return $AdminAreaClientSummaryPage;
