{include file='header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        SMS Ayarları
    </div>
    <div class="bulutfon_content">
    {if $selected} <form name="hook-kaydi" action="addonmodules.php?module=bulutfon&tab=sms-templates&id={$selected}" method="post">{/if}
<table width="100%" class="hook-form">
    <tr>
        <td style="width:165px">Hook Adı : </td>
        <td>
            <select name="hook" id="hook" class="form-control">
            <option value="">Lütfen Hook Seçiniz</option>
                {foreach from=$templates item=template}
                {assign var=type value=$template->description|json_decode}
                <option value="{$template->id}" {if $smarty.get.id eq $template->id} selected="selected"{/if}> {if isset($type->english)}{$type->turkish}{else}{$template->name}{/if}</option>
                {/foreach}
            </select>
        </td>
    </tr>
    {if $selected}
 
    <tr>
        <td colspan="2">
             {assign var=sid value=($selected-1)}
          
           <textarea name="template" id="" cols="30" rows="10" style="width:100%">{$templates.$sid->template}</textarea>
        </td>
    </tr>
    <tr>
        <td>
            Kullanılabilir değişkenler:
        </td>
        <td>
            {$templates.$sid->variables}
        </td>
    </tr>
    <tr>
        <td>Hook Durumu:</td>
        <td>
        {if $templates.$sid->active eq 1}
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
            <h3>Şablon Kullanımı</h3>
            <p>1) Lütfen değiştirmek istediğiniz sms şablonunu yukarıdan seçin.</p>
            <p>2) Seçilen şablonlarda kullanılabilecek değişkenler <strong>Kullanılabilir Değişkenler</strong> alanında görülecektir.</p>
            <p>3) Lütfen değişkenlerin değerlerini göz önüne alarak mesajınızı belirleyiniz.</p>
            <h3>Aktif Hooklar</h3>
            <ol style="padding-left:24px;">
            {foreach from=$templates item=temp}
                {if $temp->active eq 1}
                    {assign var=type value=$temp->description|json_decode}
                    <li>{if isset($type->english)}{$type->turkish}{else}{$temp->name}{/if} [<a href="addonmodules.php?module=bulutfon&tab=sms-templates&id={$temp->id}&active=0&back=list">Pasifleştir</a>]</li>
                {/if}
            {/foreach}
            </ol>
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