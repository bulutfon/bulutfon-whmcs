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
                    <td>{$template->active}</td>
                    <td>Duzenle</td>
                </tr>
            {/foreach}
        </table>
    </div>
</div>

{include file='../layout/footer.tpl'}