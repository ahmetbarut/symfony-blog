**Daha Yeni Başladım Henüz Bitmemiştir !**
 
# Symfony ile Basit Blog
Burda yaptıklarımı teker teker anlatmaya çalışacağım.

- [Symfony ile Basit Blog](#symfony-ile-basit-blog)
- [Başlangıç](#başlangıç)
  - [Kurulum](#kurulum)
      - [symfony-cli ile kurulum](#symfony-cli-ile-kurulum)
      - [composer ile kurulum](#composer-ile-kurulum)
- [Dizinleri Tanıyalım](#dizinleri-tanıyalım)
  - [bin](#bin)
  - [config](#config)
  - [migrations](#migrations)
  - [public](#public)
  - [src](#src)
  - [templates](#templates)
  - [tests](#tests)
  - [translations](#translations)
  - [var](#var)
  - [vendor](#vendor)
- [Uygulamaya Giriş](#uygulamaya-giriş)
  - [Uygulamayı Çalıştıralım](#uygulamayı-çalıştıralım)
- [İçerikler](#i̇çerikler)
# Başlangıç
Merhaba, bu projemde basit bir blog yazacağım . ben symfony'nin [framework-bundle(Çerçeve Paketi)](https://github.com/symfony/framework-bundle)  kurdum. Bu, web uygulamaları geliştirmek için öneriliyor ve web geliştirme için gereken bileşenleri dahil ediyor. Ayrıyeten `skeleton` var o da daha az bileşen ile yüklü geliyor. Örnek verecek olursam `Form` kullanacaksınız, `symfony/form` paketini yüklemeniz gerekecektir ve bunun benzeri gibi paketler yüklemeniz gerekecektir. Bu nedenle daha hızlı bir başlnafıç için bunu seçtim.

## Kurulum
Kurulum için `symfony-cli` kullanacağım, siz isterseniz composer kullanabilirsiniz.

#### symfony-cli ile kurulum
```shell 
    symfony new blog --full
```
`blog` projemin adı, eğer o isimde bir dizin varsa projeyi oluşturmayacaktır.
`--full` bayrağı da gerekli olan tüm bileşenleri kuracak. Eğer `--full` bayrağını koymazsanız size sadece iskeleti kurar.

#### composer ile kurulum
`symfony-cli` ile aynı şekilde kurulumu yapar arada fark yok.
```shell
 composer create-project symfony website-skeleton blog
```
# Dizinleri Tanıyalım
## bin
`bin` dizini konsol ile işlemler yaptığımızda, kullanılan yerdir. Örnek `controller` oluşturmamız gerekiyor bunun içi şu komutu çalıştırıyoruz.
```bash
  php bin/console make:controller
```
## config
`config` dizini içerisinde yapılandırmalarımız, rotalar vb. framework için tüm yapılandırmaların bulunduğu yerdir.
## migrations
`migrations` klasörü, oluşturacağımız migration dosyalarını içerisinde tutar.
## public
`public` dizini içinde `index.php`, `js`, `css` ve `fotoğraflarımızı` koyacağımız yerdir. Dışarıya açık tek dizindir.
## src
`src` dizini içinde asıl kodlarımız olacak. Entity, forms, controller vb. dosyalarımız içinde olacak. En çok içinde çalışacağımız dizinlerden birisidir.

## templates
`templates` dizini içinde şablonlarımız olacak. Diğer deyimle `view`larımız.
## tests
`tests` dizinide, testlerimiz yazabileceğimiz dizindir. Test yazarsanız kullanırsınız.
## translations
`translations` dizini, eğer uygulamanızda çoklu dil kullanırsanız bu dizin içerisinden dil ile alakalı eklemeleri yaparsınız.
## var
`var` dizini, framework tarafından kullanılır. İçinde, `session`, `cache`, `log` gibi dosyaları tutacaktır.
## vendor
`vendor` dizinide `composer` ile kurulan paketlerin bulunduğu yerdir. 

# Uygulamaya Giriş
Artık başlamaya hazırız, aklınıza takılan birşeyler varsa soru sorun!
## Uygulamayı Çalıştıralım
`symf`

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