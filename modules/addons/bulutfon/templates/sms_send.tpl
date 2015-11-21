{include file='header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        Gonderilen SMS'ler
    </div>
    <div class="bulutfon_content">
        <table class='table table-bordered'>

        {foreach from=$all_sms item=sms}
        <tr>
            <td>{$sms->id}</td>
            <td>{$sms->content}</td>
        </tr>
        {/foreach}
        </table>

    </div>
</div>

{include file='footer.tpl'}
