# Bulutfon WHMCS ADDON 

### Özellikler

* Gelen/giden aramaları listeleme.
* Gelen/giden aramaları kullanıcı profil sayfasından listeleme.
* Kullanıcıya birden fazla numara tanımlama.
* WHMCS kancaları ile kullanıcılara SMS gönderebilme.

### Gereksinimler

* PHP 5.5+
* WHMCS genel ayarlarınızda sistem adresinizi tanımlanmış olması.

### Kurulum

* [Bulutfon Whmcs v0.1.6](https://github.com/hakanersu/bulutfon-whmcs/releases/download/0.1.6/bulutfon-whmcs-0.1.6.zip) dosyalarını indirin.
* İndirmiş olduğunuz dosyaları whmcs dizinine yapıştırınız veya indirmiş olduğunuz dosya içerisinden **/modules/addons/bulutfon** klasörünü WHMCS **/modules/addons/** klasörüne taşıyınız.
* WHMCS Setup > Addon Modules menüsünü tıklayıp, yüklü addon modüller arasından **Bulutfon WHMCS Addon**'u aktif ediniz.
* **Bulutfon WHMCS Addon** aktif ediltikten sonra **Configure** butonu ile Bulutfon **cliendId** ve **clientSecret** alanlarını doldurunuz.(clientID ve clientSecret anahtarlarını bulutfon panelinizden almanız gerekmekte.)
* SMS özelliğini kullanmak istiyorsanız lütfen Sms ayarlarından gönderici ismini belirleyiniz.
* Modül için gerekli izinleri **Access Control** kısmından verdikten sonra ayarlarınız kaydederek **Bulutfon WHMCS Addon**'u kullanmaya başlayabilirsiniz.(Addon ilk kullanımda Bulutfon oAuth2 sunucusundan izin almak için sizi bu adrese yönlendirecektir)
* Yukleme islemi sonunda modules/addons/bulutfon/install dizini silebilirsiniz.

### Ekran Görüntüleri

![Bulutfon WHMCS](https://github.com/hakanersu/bulutfon-whmcs/blob/sms/screen-1.png "Bulutfon WHMCS Client Area")

![Bulutfon WHMCS](https://github.com/hakanersu/bulutfon-whmcs/blob/sms/screen-2.png "Bulutfon WHMCS Add Number")
