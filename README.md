# Bulutfon WHMCS ADDON 

Kurulum ile ilgili videoya [buradan](https://www.youtube.com/watch?v=Qf_wd-owvjA) ulaşabilirsiniz.

Güncel versiyon için lütfen git reposunu kullanın.

### Güncellemeler

#### v0.0.3
* Whmcs 6 için güncelleme yapıldı.
 
#### v0.0.2
* Whmcs **Phone Number** alanında düzgün formatlanmamış numaralar için Türkiye alan koduyla ekstra numara sorgusu eklendi.

### Özellikler

* Gelen/giden aramaları listeleme.
* Gelen/giden aramaları kullanıcı profil sayfasından listeleme.
* Kullanıcıya birden fazla numara tanımlama.

### Gereksinimler

* PHP 5.4+
* WHMCS genel ayarlarınızda sistem adresinizi tanımlanmış olması.


### Kurulum

* İndirmiş olduğunuz dosyaları whmcs dizinine yapıştırınız veya indirmiş olduğunuz dosya içerisinden **/modules/addons/bulutfon** klasörünü WHMCS **/modules/addons/** klasörüne taşıyınız.
* WHMCS Setup > Addon Modules menüsünü tıklayıp, yüklü addon modüller arasından **Bulutfon WHMCS Addon**'u aktif ediniz.
* **Bulutfon WHMCS Addon** aktif ediltikten sonra **Configure** butonu ile Bulutfon **cliendId** ve **clientSecret** alanlarını doldurunuz.(clientID ve clientSecret anahtarlarını bulutfon panelinizden almanız gerekmekte.)
* Modül için gerekli izinleri **Access Control** kısmından verdikten sonra ayarlarınız kaydederek **Bulutfon WHMCS Addon**'u kullanmaya başlayabilirsiniz.

### Ekran Görüntüleri

![Bulutfon WHMCS](http://ersu.cdn.tc/img/bf/bf-whmcs-1.png "Bulutfon WHMCS Client Area")

![Bulutfon WHMCS](http://ersu.cdn.tc/img/bf/bf-whmcs-2.png "Bulutfon WHMCS Add Number")
