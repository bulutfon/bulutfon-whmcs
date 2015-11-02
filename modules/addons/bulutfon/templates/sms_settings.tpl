{include file='header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        SMS Ayarları
    </div>
    <div class="bulutfon_content">
        <form action="addonmodules.php?module=bulutfon&tab=sms-settings" name="sms-settings" method="post">
            <div class="form-group">
                <p>
                    <label for="sms-basligi">SMS Başlığı:</label>
                    <input type="text" name="sms-basligi"  value="{$title}" id="sms-basligi" placeholder="Mesajların gönderileceği başlık.(Genelde şirket ismi Örn: BULUTFON)" data-required="true" data-error-message="Lütfen sms başlığı giriniz.">
                    <span></span>
                </p>
                <p class="help-text">Başlığın kısa olmasına dikkat edin.</p>
            </div>
            {if isset($error)}
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Hata:</span>
                      Bir hata oluştu. Lütfen başlığın 2 karakterden uzun 12 karakterden kısa olmasına dikkat ediniz.
                    </div>    
                </div>
            </div>
            {/if}
            <div class="row">
                <div class="col-md-12 text-center">
                    <input type="submit" value="Kaydet" class="btn-gonder">             
                </div>
            </div>
        </form>
    </div>
</div>

{include file='footer.tpl'}