{include file='../layout/header.tpl'}

<div class="card">
    <div class="card-header">
        Sms Template'leri
    </div>

    <div class="card-body">
        <table class="bf-table bordered">
            <thead>
                <tr>
                    <th>Aksiyon</th>
                    <th>Mesaj</th>
                    <th>Sms Gönderimi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="section">
                    <td  colspan="3">Müşteri Kancaları</td>
                </tr>
                <tr>
                    <td>Kullanıcı Kaydı</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Şifre değişimi</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
               
                <tr class="section">
                    <td  colspan="3">Fatura Kancaları</td>
                </tr>
                 <tr>
                    <td>Fatura oluşturuldu</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Fatura ödendi</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Fatura birinci hatırlatma</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Fatura ikinci hatırlatma</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Fatura üçüncü hatırlatma</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr class="section">
                    <td  colspan="3">Destek Bileti Kancaları</td>
                </tr>
                <tr>
                    <td>Destek bileti oluşturuldu</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Destek bileti cevaplandı</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr class="section">
                    <td  colspan="3">Alan adları Kancaları</td>
                </tr>
                 <tr>
                    <td>Alan adı kaydedildi</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alan adı transferi başlatıldı</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alan adı yenilendi</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alan adı yenileme birinci hatırlatma</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alan adı yenileme ikinci hatırlatma</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alan adı yenileme üçüncü hatırlatma</td>
                    <td>
                        <input type="text" value="Template icerigi burada olacak..." class="form-control">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Kancaları Kaydet</button>
        {* <table class="table table-bordered">
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
        </table> *}
    </div>
</div>

{include file='../layout/footer.tpl'}