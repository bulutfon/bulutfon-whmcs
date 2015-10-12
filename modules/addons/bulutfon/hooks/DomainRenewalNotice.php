<?php

if(!isset($DomainRenewalNotice)) {
    $DomainRenewalNotice= function($args) use($provider,$token,$repository){

    };
}


return $DomainRenewalNotice;