<?php
if (!isset($AdminAreaClientSummaryPage)) {
    $AdminAreaClientSummaryPage = function ($args) {
        $head = "<div style='min-height:200px;display:none;'><img src='../modules/addons/bulutfon/assets/img/loader.gif' class='bulutfon-loader'/></div>";
        return $head;
    };
}
return $AdminAreaClientSummaryPage;
