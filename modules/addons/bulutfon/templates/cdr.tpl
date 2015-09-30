{include file='header.tpl'}
        {if $userNumbers}
        <table width="100%" class="form bulutfon-table" style="margin-bottom:15px;float:left;">
    <tbody>
        <tr>
            <td colspan="2" class="fieldarea" style="text-align:center;"><strong>Kullanıcı Telefon Numaraları</strong></td>
        </tr>
        <tr>
            <td align="center">
                 <table class="datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Telefon Numarası</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$userNumbers item=number}
                            <tr class="bulutfon-number">
                                <td>{$number}</td>
                                <td><button data-number="{$number}" class="button delete-bulutfon-number">Numarayı Sil</button></td>
                            </tr>
                        {/foreach}
                    </tbody>
                 </table>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <a href="addonmodules.php?module=bulutfon&tab=addtouser" class="button">Yeni Numara Ekle</a>
            </td>
        </tr>
        
    </tbody>
</table>
{/if}

<table width="100%" class="form bulutfon-table">
    <tbody>
        <tr>
            <td colspan="2" class="fieldarea" style="text-align:center;"><strong>Arama Kayıtları</strong></td>
        </tr>
        <tr>
            <td align="center">
                <table class="datatable" style="width:100%">
                    <thead>
                    <tr>
                        <th>Arama Tipi</th>
                        <th>Yön</th>
                        <th>Arayan</th>
                        <th>Aranan</th>
                        <th>Arama Zamanı</th>
                        <th>Cevaplanma Zamanı</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    {foreach from=$cdrs item=cdr}
                        <tr>
                            <td>{$cdr->bf_calltype}</td>
                            <td>{$cdr->direction}</td>
                            {if strlen($cdr->caller)>4}
                                <td>
                                    +{$cdr->caller|substr:0:2} ({$cdr->caller|substr:2:3}) {$cdr->caller|substr:5:3} {$cdr->caller|substr:8:4}
                                    <a href="addonmodules.php?module=bulutfon&tab=addtouser&number={$cdr->caller}"><img src="../modules/addons/bulutfon/assets/img/add.png" alt=""/></a>
                                </td>
                            {else}
                                <td>{$cdr->caller}</td>
                            {/if}
                            {if strlen($cdr->callee)>4}
                                <td>
                                    +{$cdr->callee|substr:0:2} ({$cdr->callee|substr:2:3}) {$cdr->callee|substr:5:3} {$cdr->callee|substr:8:4}
                                    <a href="addonmodules.php?module=bulutfon&tab=addtouser&number={$cdr->callee}"><img src="../modules/addons/bulutfon/assets/img/add.png" alt=""/></a>
                                </td>

                            {else}
                                <td>{$cdr->callee}</td>
                            {/if}
                            <td>{$cdr->call_time|date_format:"%e %B %Y"}
                               {$cdr->call_time|date_format:"%H:%M:%S"}
                            </td>
                            <td>
                                {$cdr->answer_time|date_format:"%e %B %Y"}
                                {$cdr->answer_time|date_format:"%H:%M:%S"}
                            </td>
                         
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>



{if $userid}
<p align="center">
    {if $page==1}
    « Önceki Sayfa &nbsp;
    {else}
    <a href="clientssummary.php?bulutfon=1&amp;page={$page-1}&amp;userid={$userid}{if $limit}&amp;limit={$limit}{/if}">« Önceki Sayfa </a>
    {/if}
    <a href="clientssummary.php?bulutfon=1&amp;page={$page+1}&amp;userid={$userid}{if $limit}&amp;limit={$limit}{/if}">Next Page » </a>
</p>
{else}
<p align="center">
    {if $page==1}
    « Önceki Sayfa &nbsp;
    {else}
    <a href="addonmodules.php?module=bulutfon&amp;page={$page-1}{if $limit}&amp;limit={$limit}{/if}">« Önceki Sayfa </a>
    {/if}
    <a href="addonmodules.php?module=bulutfon&amp;page={$page+1}{if $limit}&amp;limit={$limit}{/if}">Next Page » </a>
</p>
{/if}

{include file='footer.tpl'}