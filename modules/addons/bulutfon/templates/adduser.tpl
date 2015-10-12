{include file='header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        Kullanıcıya numara ekle
    </div>
    <div class="bulutfon_content">
        {if $success}
            <div style="background-color: #dff0d8;border: 1px solid #d6e9c6;color: #3c763d;padding:5px">
                {$success}
            </div>
        {/if}
        {if $debug}
            <div style="background-color: #dff0d8;border: 1px solid #d6e9c6;color: #3c763d;padding:5px">
                {$debug}
            </div>
        {/if}
        <form action="addonmodules.php?module=bulutfon&tab=addtouser" id="form-kullanici" method="post">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <label for="telefon-numarasi">Telefon Numarası:</label>
                        <input type="text" name="telefon-numarasi" value="{$number}" id="telefon-numarasi" placeholder="Lütfen telefon numarası giriniz."  data-required="true" data-error-message="Lütfen telefon numarası giriniz." />
                        <span></span>
                        {if $telefon}
                            {$telefon}
                        {/if}
                    </p>
                </div>
                <div class="col-md-6">
                    <p >
                        <label for="kullanici">Kullanıcı:</label>
                        <input type="text" name="value" value="" id="kullanici" placeholder="Kullanıcı seçiniz." autocomplete="off" style="min-width: 270px;"/>
                        <span></span>
                        {if $user}
                            {$user}
                        {/if}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <input type="submit" value="Numarayı Ekle" class="btn-gonder"/>
                    
                </div>
            </div>
            <br>
            
            <div align="left" id="kullanici-searchresults"></div>
            
            <input type="hidden" value="" name="clientid" id="bulutfon-clientid"/>
            <input type="hidden" name="intellisearch" value="1"/>
        </form>
    </div>
 </div>
{include file='footer.tpl'}
