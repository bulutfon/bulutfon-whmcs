{include file='header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        SMS Ayarları
    </div>
    <div class="bulutfon_content">
    {if $selected} 
    <form name="hook-kaydi" action="addonmodules.php?module=bulutfon&tab=sms-templates&id={$selected}" method="post">{/if}
    <table width="100%" class="hook-form">
        
        {if $selected}
        <tr>
            <td style="width:165px">Hook Adı : </td>
            <td>
                <select name="hook" id="hook" class="form-control">
                <option value="">Lütfen Hook Seçiniz</option>
                    {foreach from=$templates item=temps}
                    {assign var=type value=$temps->description|json_decode}
                    <option value="{$temps->id}" {if $smarty.get.id eq $temps->id} selected="selected"{/if}> {if isset($type->english)}{$type->turkish}{else}{$temps->name}{/if}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
               <textarea name="template" id="" cols="30" rows="10" style="width:100%">{$template->template}</textarea>
            </td>
        </tr>
        <tr>
            <td>
                Kullanılabilir değişkenler:
            </td>
            <td>
                {$template->variables}
            </td>
        </tr>
        <tr>
            <td>Hook Durumu:</td>
            <td>
            {if $template->active eq 1}
                <span class="label label-success" style="background:#5cb85c;text-transform:none;padding:3px 15px;font-size:14px;">Aktif</span> [<a href="addonmodules.php?module=bulutfon&tab=sms-templates&id={$selected}&active=0">Pasifleştir</a>]
            {else}
             <span class="label label-success" style="background:#d9534f;text-transform:none;padding:3px 15px;font-size:14px;">Pasif</span> 
                [<a href="addonmodules.php?module=bulutfon&tab=sms-templates&id={$selected}&active=1">Aktifleştir</a>]
            {/if}
            
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Kaydet" class="btn btn-success"></td>
        </tr>
        </form>
        {else}
        <tr>
            <td colspan="2">
            <table class="table table-bordered" style="background: #fff;">
            <tr>
              <th>Detaylar</th>
              <th>Durumu</th>
              <th>İşlem</th>
            </tr>
                {foreach from=$templates item=temp}
                    {assign var=desc value=$temp->description|json_decode}
                    <tr>
                        <td>
                            {if !isset($desc->turkish)}
                            <p>{$temp->name}</p>
                            {else}
                            <p>{$desc->turkish}</p>
                            {/if}
                        </td>
                        <td>
                            {if $temp->active eq 1}
                                <a href="http://stage.ni.net.tr/panel/admin/addonmodules.php?module=bulutfon&tab=sms-templates&id={$temp->id}&active=0&back=list" class="btn btn-success btn-sm">AKTİF</a>
                            {else}
                                <a href="http://stage.ni.net.tr/panel/admin/addonmodules.php?module=bulutfon&tab=sms-templates&id={$temp->id}&active=1&back=list" class="btn btn-danger btn-sm">PASİF</a>
                            {/if}
                        </td>
                        <td>
                            <a href="addonmodules.php?module=bulutfon&tab=sms-templates&id={$temp->id}" class="btn btn-primary btn-sm">Düzenle</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
            </td>
        </tr>
        {/if}
        
    </table>
    <script>
        function redirect(goto){
            if (goto != '') {
                window.location = goto;
            }
        }
        var selectEl = document.getElementById('hook');
        selectEl.onchange = function(){
            var goto = this.value;
            redirect('addonmodules.php?module=bulutfon&tab=sms-templates&id='+goto);
        };
    </script>
    </div>
</div>

{include file='footer.tpl'}