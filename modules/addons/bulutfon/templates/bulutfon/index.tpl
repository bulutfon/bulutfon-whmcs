{include file='../layout/header.tpl'}
<div class="tab-content client-tabs">
    <div class="tab-pane active">
        <div class="tablebg">
            <table id="sortabletbl0" class="datatable mb-0" width="100%" cellspacing="1" cellpadding="3" border="0">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Arayan</th>
                        <th>Aranan</th>
                        <th>Cagri Tipi</th>
                        <th>Arama Kaydi</th>
                        <th>Arama Zamani</th>
                        <th>Kapatma Zamani</th>
                        <th>Cagri Durumu</th>
                    </tr>
                    {foreach from=$cdrs item=cdr}
                        <tr>
                            <td>
                                {if $cdr->user}
                                    <a href="clientssummary.php?userid={$cdr->user->id}">{$cdr->user->id}</a>
                                {else}
                                    -
                                {/if}
                            </td>
                            <td>
                                {if $cdr->user}
                                    <a href="clientssummary.php?userid={$cdr->user->id}">{$cdr->user->firstname} {$cdr->user->lastname}</a>
                                    <div style="font-size: 12px;background: #e3e3e3;display: inherit;border-radius: 4px;padding: 2px 5px;">{$cdr->caller}</div>
                                {else}
                                    {$cdr->caller}
                                {/if}
                            </td>
                            <td>{$cdr->callee}</td>
                            <td class="text-center">

                                {if $cdr->direction eq "IN"}
                                    <span class="label active">GELEN ÇAĞRI</span>
                                {else}
                                    <span class="label inactive">GİDEN ÇAĞRI</span>
                                {/if}
                            </td>
                            <td class="text-center">

                                {if $cdr->missing_call eq "NO"}
                                    <span class="label closed">YOK</span>
                                {else}
                                    Yes
                                {/if}
                            </td>

                            <td>{$cdr->answer_time}</td>
                            <td>{$cdr->hangup_time}</td>
                            <td class="text-center">

                                {if $cdr->missing_call}
                                    <span class="label closed">Kaçan Çağrı</span>
                                    {else}
                                    <span class="label active">Aktif</span>
                                {/if}
                            </td>
                        </tr>
                    {/foreach}

                </tbody>
                <tfoot>
                <tr>

                        <td>
                            {if $page neq 1}
                            <a href="addonmodules.php?module=bulutfon&page={$previous}"><i class="fa fa-chevron-left"></i> Önceki Sayfa</a>
                            {/if}
                        </td>
                        <td colspan="6"></td>
                        <td class="text-right"><a href="addonmodules.php?module=bulutfon&page={$next}">Sonraki Sayfa<i class="fa fa-chevron-right"></i></a></td>

                </tr>
                </tfoot>
            </table>

                        </div>

                    </div>
                </div>


{include file='../layout/footer.tpl'}