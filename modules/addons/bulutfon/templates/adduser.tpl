<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        <img src="https://www.bulutfon.com/assets/logo-67b9333837f7548483355b2c0cee4623.png" alt="" class="logo"/>
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
            <p>
                <label for="telefon-numarasi">Telefon Numarası:</label>
                <input type="text" name="telefon-numarasi" value="{$number}" id="telefon-numarasi" placeholder="Lütfen telefon numarası giriniz."  data-required="true" data-error-message="Lütfen telefon numarası giriniz."/>
                <span></span>
                {if $telefon}
                    {$telefon}
                {/if}
            </p>
            <p>
                <label for="kullanici">Kullanıcı:</label>
                <input type="text" name="value" value="" id="kullanici" placeholder="Kullanıcı seçiniz." autocomplete="off" />
                <span></span>
                {if $user}
                    {$user}
                {/if}
            </p>
            <div align="left" id="kullanici-searchresults"></div>
            <p>
                <input type="submit" value="Numarayı Ekle"/>
            </p>
            <input type="hidden" value="" name="clientid" id="bulutfon-clientid"/>
            <input type="hidden" name="intellisearch" value="1"/>
        </form>
    </div>
 </div>

