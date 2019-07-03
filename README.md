# Bulutfon WHMCS 7.X ADDON

### Özellikler

* Gelen/giden aramaları listeleme.
* Gönderilen SMS'leri listeleme.
* ~~WHMCS kancaları ile kullanıcılara SMS gönderebilme.~~

### Gereksinimler

* PHP 7+
* WHMCS 7+
* CURL

### Kurulum & Ayarlar

* [Bu linke](https://github.com/hakanersu/bulutfon-whmcs/releases/latest/download/modules.zip) tıklayarak addonu direkt olarak indirebilirsiniz veya Github addon sayfasında bulunan [releases](https://github.com/hakanersu/bulutfon-whmcs/releases) linkini kullanarak en güncel dağıtımı indirebilirsiniz.
* Zip dosyasini açtıktan sonra addons **modules** dizini WHMCS ana dizinine yapıştırın veya modules/addons/bulutfon klasörünü whmcs dizini içerisinde modules/addons/ klasörü içerisine yapıştırın.
* Eklentiyi aktifleştirmek için Whmcs yönetim panelinizde Setup > Addon Modules menüsünü takip edin. Bu sayfada "Bulutfon WHMCS Addon" adıyla eklentiyi görebilmeniz gerek.
* Eklentiyi "Activate" butonuna tıklayarak aktif duruma getirin ve "Configure" butonuna tıklayarak eklenti ayarlarını açın.
* Burada sizden Bulutfon "Token" yani api anahtarınızı isteyecektir. API Anathtarı/Token'ı almak için **Bulutfon Yönetim Panelinizden** Santral > Genel Ayarlar menüsünü takip ettikten sonra, Geliştirici Araçları tabında bulunan "Mevcut API Anahtarını Göster" butonuna tıklamanız yeterlidir.
* Eklenti ayarlarında Ürün Ortamını, **Üretim Ortamı** olarak seçin.
* SMS Başlığı kısmında eğer Bulutfon tarafında size tanımlanmış bir SMS başlığı varsa bunu yazın, eğer yoksa bu alanı boş bırakın.
* "Access Control" kısmında hangi rollerin eklentiye erişebileceğini seçtikten sonra ayarları kaydedin. 


### Güncellemeler

#### v2.0.2

* Arama kayıtları ve sms kayıtları listeleme sayfaları performansı güncellendi ve kullanıcı eşleştirme süreçleri iyileştirildi.
* SMS gönderme ve web kancaları ilerleyen versiyonlarda yeni yapıya uygun olarak eklenmek üzere devre dışı bırakıldı.
* Dış bağımlılıklar kaldırıldı.
* Hooklar ve sms şablonları  bu versiyonda devre dışı bırakıldı.

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


## Ekran Görüntüleri

#### Çağrı Kayıtları Listeleme
![alt text](https://raw.githubusercontent.com/hakanersu/bulutfon-whmcs/master/screenshots/whmcs-1.PNG)

#### SMS Kayıtları Listeleme
![alt text](https://raw.githubusercontent.com/hakanersu/bulutfon-whmcs/master/screenshots/whmcs-2.PNG)

#### Profil Sayfası Çağrı Kayıtları
![alt text](https://raw.githubusercontent.com/hakanersu/bulutfon-whmcs/master/screenshots/whmcs-3.PNG)





