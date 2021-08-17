**Sürekli Yeni İçerikler Eklenecektir!**
 
# Symfony ile Basit Blog
Burda yaptıklarımı teker teker anlatmaya çalışacağım.

# Başlangıç
Merhaba, bu projemde basit bir blog yazacağım . ben symfony'nin [framework-bundle(Çerçeve Paketi)](https://github.com/symfony/framework-bundle)  kurdum. Bu, web uygulamaları geliştirmek için öneriliyor ve web geliştirme için gereken bileşenleri dahil ediyor. Ayrıyeten `skeleton` var o da daha az bileşen ile yüklü geliyor. Örnek verecek olursam `Form` kullanacaksınız, `symfony/form` paketini yüklemeniz gerekecektir ve bunun benzeri gibi paketler yüklemeniz gerekecektir. Bu nedenle daha hızlı bir başlnafıç için bunu seçtim.

# İçerikler
- [Veritabanı ayarları](wiki/1-veritabani.md)
- [Routing](wiki/2-route-ve-route-tanimlama.md)
  - [Kullanılan rota türleri ve dosyalar](wiki/README.md#router)
  - [Rota dosyalarını yapılandırma ve symfony tarafından yükleme](wiki/README.md#rota-yapılandırması)
  - [Rota tanımlama](wiki/2-route-ve-route-tanimlama.md#tanimlama)
  - [Controller Yükleme](wiki/2-route-ve-route-tanimlama.md#tanimlama)
  - [Parametreler](wiki/2-route-ve-route-tanimlama.md#route-parametreleri)
- [Controller](wiki/3-controller.md#template-isleme)
  - [Template işleme](wiki/3-controller.md#template-isleme)
    - Sadece `AbstractController` sınıfını soyutlayan sınıflar için kullanımı mevcut.
- [Formlar](wiki/4-form.md)
  - [Form oluşturma](wiki/4-form.md#form-oluşturma)
  - [Formu şablonda kullanma](wik/4-form.md#şablonda-kullanma)
  - Form parametreleri
  - Form temaları
- [Doctrine](wiki/5-doctrine.md)
  - veri ekleme
  - veri listeleme
  - veri güncelleme
  - veri silme
- Entity
  - Veritabanı işlerimizi yapar
- Migration
  - Migration Oluşturma
  - Tabloları Veritabanına ekleme
  - Tabloları geri alma
  - Kolon ekleme
  - Kolon Silme
  - Yapılan işlemleri geri alma 
- Authenctication
- Authorization

[Blog Teması](https://github.com/welisonmenezes/wm-simple-blog-template)