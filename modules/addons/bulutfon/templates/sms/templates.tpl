{include file='../layout/header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        SMS Sablonlari
    </div>
    <div class="bulutfon_content no-padding">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hook</th>
                    <th>Sablon</th>
                    <th>Aciklama</th>
                    <th>Durum</th>
                    <th>Duzenle</th>
                </tr>
            </thead>
            {foreach  from=$templates item=template}
                <tr>
                    <td>{$template->name}</td>
                    <td>{$template->template}</td>
                    <td>{$template->description}</td>
                    <td>
                        {if $template->active == 0}
                            <a href="addonmodules.php?module=bulutfon&action=sms&work=activate&id={$template->id}" class="btn btn-success btn-sm">Aktive Et</a>
                        {else}
                            <a href="addonmodules.php?module=bulutfon&action=sms&work=deactivate&id={$template->id}" class="btn btn-danger btn-sm">Deaktive Et</a>
                        {/if}
                    </td>
                    <td><a href="addonmodules.php?module=bulutfon&action=sms&work=edit&id={$template->id}" class="btn btn-primary btn-sm">Düzenle</a></td>
                </tr>
            {/foreach}
        </table>
    </div>
</div>

{include file='../layout/footer.tpl'}