<link type="text/css" rel="stylesheet" href="../modules/addons/bulutfon/assets/css/bulutfon.css">
<div class="row bulutfon-row">
{if !$smarty.get.userid}
    <div class="col-md-2">
        <ul class="side-menu">
            <li><a href="addonmodules.php?module=bulutfon" {if $smarty.get.action eq ''} class="active" {/if}><i class="fa fa-phone-square"></i>Arama Kayıtları</a></li>
            <li><a href="addonmodules.php?module=bulutfon&action=sms" {if $smarty.get.action eq 'sms' and $smarty.get.work eq ''} class="active" {/if}><i class="fa fa-pencil-square-o"></i>SMS Şablonları</a></li>
            <li><a href="addonmodules.php?module=bulutfon&action=sms&work=debug" {if $smarty.get.action eq 'sms' and $smarty.get.work eq 'debug'} class="active" {/if}><i class="fa fa-bug"></i>Debug</a></li>

        </ul>
    </div>
    {/if}
    <div class="{if $smarty.get.userid}col-md-12{else}col-md-10{/if}">
