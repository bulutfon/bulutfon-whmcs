<div class="row bulutfon-row">
    <div class="col-md-2">
        <ul class="side-menu">
            <li><a href="addonmodules.php?module=bulutfon" {if $smarty.get.tab eq ''} class="active" {/if}><i class="fa fa-phone-square"></i>Arama Kayıtları</a></li>
            <li><a href="addonmodules.php?module=bulutfon&amp;tab=addtouser" {if $smarty.get.tab eq 'addtouser'} class="active" {/if}><i class="fa fa-plus"></i>Yeni Numara Ekle</a></li>
            <li><a href="addonmodules.php?module=bulutfon&amp;tab=sms-templates" {if $smarty.get.tab eq 'sms-templates'} class="active" {/if}><i class="fa fa-pencil-square-o"></i>SMS Ayarları</a></li>
        </ul>
    </div>
    <div class="col-md-10">