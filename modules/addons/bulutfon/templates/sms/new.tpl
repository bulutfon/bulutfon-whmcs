{include file='../layout/header.tpl'}
<div class="card">
    <div class="card-header">
        Yeni Sms
    </div>
    <div class="card-body" style="min-height: auto;">
        <form action="addonmodules.php?module=bulutfon&action=sms&work=sendsms" method="post">
            <div class="form-group">
                <label for="inputName">Telefon Numaraları</label>
                <input type="text" name="numbers" id="inputName" class="form-control" value="" required>
                <p class="text-muted">Lütfen göndermek istediğiniz numaraları noktalıvirgül ile ayırınız. Örn: (0505xxxxxxx;0555xxxxxxx)</p>
            </div>
            <div class="form-group">
                <label for="message">Gönderilecek Mesaj</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>
            </div>

            <button class="btn btn-primary">Gönder</button>
        </form>
    </div>
</div>

{include file='../layout/footer.tpl'}