# Bulutfon WHMCS 6.X/7.X ADDON

### Özellikler

* Gelen/giden aramaları listeleme.
* WHMCS kancaları ile kullanıcılara SMS gönderebilme.

### Gereksinimler

* PHP 5.5+
* WHMCS 6+
* CURL

### Kurulum

* Github addon sayfasında bulunan [releases](https://github.com/hakanersu/bulutfon-whmcs/releases) linkini kullanarak en güncel dağıtımı indirin.
* Zip dosyasini açtıktan sonra addons **modules** dizini WHMCS ana dizinine yapıştırın veya modules/addons/bulutfon klasörünü whmcs dizini içerisinde modules/addons/ klasörü içerisine yapıştırın.

### Ayarlar

Modulu aktifleştirdikten sonra **Token** kısmına Bulutfon master token anahtarını girmeniz gerekmektedir.

Ürün ortamı kısmında mesajlarin gönderimi test etmek amacıyla **Gelistirme Ortami** seçeneiğini seçebilirsiniz. Geliştirme seçeneği ile mesajlarınız SMS olarak gitmeden panelinizdeki Debug bölümüne işlenecektir. Özellikle ilk kurulumlarda eklentiyi bir sure debug modunda kullanıp göderilecek SMS'leri takip etmenizi tavsiye ederim.

**SMS Basligi** seçeneği mesajınızın başlığını belirtmenizi sağlar. Bu başlık Bulutfon panelinizden onaylı olmalıdır.

### SMS Kancalari

SMS kancaları belirli durumlarda mesaj gönderebilmeniz için hazırlanmıştır. Belirtilen değişkenler ile size uygun mesajlar oluşturmanızı sağlar. Şuab için sınırlı sayıda kanca bulunmaktadir. İhtiyaç duyduğunuz kancalar varsa Github deposu üzerinden bildirebilirsiniz.

#### Kullanıcların SMS gönderimini düzenlemesi
index.php?m=bulutfon linki üzerinden kullanıcılar hangi sms'leri alıp almayacaklarını seçebilirler.

### Güncellemeler

#### v1.1.2
* Hooklardan kaynaklı hatalar giderildi.
- [ ] InvoiceCreated
- [x] AcceptOrder
- [x] InvoicePaid
- [x] TicketAdminReply
- [ ] InvoicePaymentReminder
- [x] ClientAreaRegister
- [x] ClientChangePassword

#### v1.1.0
* Whmcs 7 için güncelleme yapıldı.
* Kullanıların alabileceği sms gönderme ayarları güncelendi.

#### v1.0.3
* Musterilerin istedikleri sms'leri secebilmeleri icin addon musteri arayuzu hazirlandi.
* SMS acikalamalarini duzenleme ozelligi getirildi. Boylelikle musteri alaninda gosterilecek aciklamalar duzenlenebilecek.

#### v1.0.2
* ClientChangePassword,ClientAreaRegister,TicketAdminReply hooklari eklendi.
* Addon deaktivasyonunda meydana gelen bir hata giderildi.
* Debug metodu gelistirildi ve yeni bir debug menusu eklendi.

#### v1.0.0
* Bu versiyon ile addon kod yapisi uzerinde koklu degisikliklere gidildi.
* Panel uzerinden ses kayitlarini dinleme ozelligi eklendi.
* Kullanici sayfalarinda Bulutfon sekmesi kaldirildi.
* Addon sayfasinda bulunan ayarlarin bircogu addon ayarlari sayfasina tasindi.
* oAuth2 teknolojisi master token ile degistirildi.






