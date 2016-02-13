<link type="text/css" rel="stylesheet" href="../modules/addons/bulutfon/assets/css/bulutfon.css">
<div class="row bulutfon-row">
{if !$smarty.get.userid}
    <div class="col-md-2">
        <ul class="side-menu">
            <li><a href="addonmodules.php?module=bulutfon" {if $smarty.get.action eq ''} class="active" {/if}><i class="fa fa-phone-square"></i>Arama Kayıtları</a></li>
            <li><a href="addonmodules.php?module=bulutfon&action=sms" {if $smarty.get.action eq 'sms'} class="active" {/if}><i class="fa fa-pencil-square-o"></i>SMS Şablonları</a></li>
            <li><a href="addonmodules.php?module=bulutfon&amp;tab=sms-settings" {if $smarty.get.tab eq 'sms-settings'} class="active" {/if}><i class="fa fa-cog"></i>SMS Ayarları</a></li>
            <li><a href="addonmodules.php?module=bulutfon&amp;tab=sms-send" {if $smarty.get.tab eq 'sms-send'} class="active" {/if}><i class="fa fa-cog"></i>Gonderilen SMS'ler</a></li>
        </ul>
    </div>
    {/if}
    <div class="{if $smarty.get.userid}col-md-12{else}col-md-10{/if}">
