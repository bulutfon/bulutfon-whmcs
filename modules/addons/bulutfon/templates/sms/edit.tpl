{include file='../layout/header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        Duzenle
    </div>
    <div class="bulutfon_content">
        <form action="addonmodules.php?module=bulutfon&action=sms&work=update&id={$template->id}" method="post">
        <table class="table">
            <tr>
                <td width="250">Hook:</td>
                <td>{$template->name}</td>
            </tr>
            <tr>
                <td>Aciklama:</td>
                <td>{$template->description}</td>
            </tr>
            <tr>
                <td>Kullanilabilir Degiskenler:</td>
                <td>{$template->variables}</td>
            </tr>
            <tr>
                <td>Template:</td>
                <td><textarea name="template" id="" cols="30" rows="10" style="width:100%">{$template->template}</textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="text-center">
                        <input type="submit" value="Kaydet" class="btn btn-primary">
                    </p>
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>

{include file='../layout/footer.tpl'}