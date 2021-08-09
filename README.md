# Daha Yeni Başladım Henüz Bitmemiştir !
# Symfony ile Basit Blog
### Burda yaptıklarımı teker teker anlatmaya çalışacağım.

* [# Başlangıç](#başlangıç)

## Başlangıç
Merhaba, bu projemde basit bir blog yazacağım . ben symfony'nin [framework-bundle(Çerçeve Paketi)](https://github.com/symfony/framework-bundle)  kurdum. Bu, web uygulamaları geliştirmek için öneriliyor ve web geliştirme için gereken bileşenleri dahil ediyor. Ayrıyeten `skeleton` var o da daha az bileşen ile yüklü geliyor. Örnek verecek olursam `Form` kullanacaksınız, `symfony/form` paketini yüklemeniz gerekecektir ve bunun benzeri gibi paketler yüklemeniz gerekecektir. Bu nedenle daha hızlı bir başlnafıç için bunu seçtim.

## Kurulum
Kurulum için `symfony-cli` kullanacağım, siz isterseniz composer kullanabilirsiniz.

#### symfony-cli ile kurulum
```shell 
    symfony new blog --full
```
`blog` projemin adı, eğer o isimde bir dizin varsa projeyi oluşturmayacaktır.
`--full` bayrağı da gerekli olan tüm bileşenleri kuracak. Eğer `--full` bayrağını koymazsanız size sadece iskeleti kurar.

```shell

 composer create-project symfony website-skeleton blog
```




# İçerikler
* Veritabanı ayarları
  * Postgresql veritabanı
* Routing
  * Kullanılan rota türleri ve dosyalar
  * Rota dosyalarını yapılandırma ve symfony tarafından yükleme
  * Rota tanımlama
  * Controller Yükleme
  * Parametreler
* Controller
  * Template işleme 
  * Formlar
  * Veriler
* Entity
  * Veritabanı işlerimizi yapar
* Form
  * Form oluşturma
  * Formu şablonda kullanma
  * Form parametreleri
  * Form temaları
* Migration
  * Migration Oluşturma
  * Tabloları Veritabanına ekleme
  * Tabloları geri alma
  * Kolon ekleme
  * Kolon Silme
  * Yapılan işlemleri geri alma 
* Doctrine
  * veri ekleme
  * veri silme
  * veri güncelleme
  * veri listeleme
* Authenctication
* Authorization