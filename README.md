# Bulutfon WHMCS 6.X ADDON 

### Özellikler

* Gelen/giden aramaları listeleme.
* WHMCS kancaları ile kullanıcılara SMS gönderebilme.

### Gereksinimler

* PHP 5.5+
* WHMCS 6+
* CURL

### Kurulum

* Github addon sayfasinda bulunan [releases](https://github.com/hakanersu/bulutfon-whmcs/releases) linkini kullanarak en guncel dagitimi indirin.
* Zip dosyasini actiktan sonra addons **modules** dizini WHMCS ana dizinine yapistirin veya modules/addons/bulutfon klasorunu whmcs dizini icerisinde modules/addons/ klasoru icerisine yapistirin.

### Ayarlar

Modulu aktiflestirdikten sonra **Token** kismina Bulutfon master token anahtarini girmeniz gerekmektedir.

Urun ortami kisminda mesajlarin gonderimini test etmek amaciyla **Gelistirme Ortami** secenegini secebilirsiniz. Gelistirme secenegi ile mesajlariniz SMS olarak gitmeden panelinizdeki Debug bolumune islenecektir. Ozellikle ilk kurulumlarda eklentiyi bir sure debug modunda kullanip gonderilecek SMS'leri takip etmenizi tavsiye ederim.

**SMS Basligi** secenegi mesajinizin basligini belirtmenizi saglar. Bu baslik Bulutfon panelinizden onayli olmalidir.

### SMS Kancalari

SMS kancalari belirli durumlar mesaj gonderebilmeniz icin hazirlanmistir. Belirtilen degiskenler ile size uygun mesajlar olusturmanizi saglar. Suan icin sinirli sayida kanca bulunmaktadir. Ihtiyac duydugunuz kancalar varsa Github deposu uzerinden bildirebilirsiniz.

### Guncelleme

#### v1.0.0
* Bu versiyon ile addon kod yapisi uzerinde koklu degisikliklere gidildi.
* Panel uzerinden ses kayitlarini dinleme ozelligi eklendi.
* Kullanici sayfalarinda Bulutfon sekmesi kaldirildi.
* Addon sayfasinda bulunan ayarlarin bircogu addon ayarlari sayfasina tasindi.
* oAuth2 teknolojisi master token ile degistirildi.






