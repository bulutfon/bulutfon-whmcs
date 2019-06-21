
<form action="index.php?m=bulutfon" method="post">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SMS</th>
                <th>Durum</th>
            </tr>
        </thead>
        {foreach from=$hooks item=hook}
            {if $hook->active==1 && $hook->name!='ClientAreaRegister'}
            <tr>
                <td>{$hook->description}</td>
                <td>
                    <input type="checkbox" name="{$hook->name}" {if $settings[$hook->name] == 1 || is_null($settings[$hook->name])}checked{/if}>
                </td>
            </tr>
            {/if}
        {/foreach}
    </table>
    <table class="table table-bordered">
        <tr>
            <td><strong>Hicbir sms istemiyorum.</strong></td>
            <td>
                <input type="checkbox" name="all" {if $settings['all']==1}checked{/if}>
            </td>
        </tr>
    </table>
    <input type="submit" value="Kaydet" class="btn btn-primary">
</form>