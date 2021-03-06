

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
- [Router](#router)
  - [annotations](#annotations)
  - [attributes](#attributes)
  - [Yaml](#yaml)
  - [php](#php)
- [Rota yapılandırması](#rota-yapılandırması)


# Kurulum
Kurulum için `symfony-cli` kullanacağım, siz isterseniz composer kullanabilirsiniz.

## symfony-cli ile kurulum
```shell 
    symfony new blog --full
```
`blog` projemin adı, eğer o isimde bir dizin varsa projeyi oluşturmayacaktır.
`--full` bayrağı da gerekli olan tüm bileşenleri kuracak. Eğer `--full` bayrağını koymazsanız size sadece iskeleti kurar.

## composer ile kurulum
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
> [symfony-cli](https://symfony.com/download) kurmanız gereklidir(Resmi belgelerde, console üzerinden başlatmayı bulamadım)

```shell 
  symfony server:start -d
```
`-d` bayrağı, arkaplanda sunucuyu çalıştırır isterseniz `-d` bayrağını koymayın. 
Yerel sunucumuz [http://127.0.0.1:8000](http://127.0.0.1:8000) adresinde varsayılan olarak başlıyor.

`-d` bayrağı ile başlattıysanız bu komut ile durdurabilirsiniz.
```shel
  symfony server:stop
```
`env` dosyasını tanıyalım:
```env
DATABASE_URL # veritabanı sunucusu bağlantı bilgileri symfony'de url hazır geliyor siz sadece bilgileri doldurursunuz.
MAILER_DSN # Uygulamanızda e-posta servisi kullanacaksanız buraya gereken yapılandırmayı eklemeniz gerekli.
APP_ENV # Uygulama durumu, `production` ve `dev` eğer geliştirmedeyseniz `dev` olarak bırakmalısınız.  
APP_SECRET # Framework'un şifrelenmesi için, framework tarafından üretilen anahtar.
```
# Router
Symfony, bize router için 5 kullanım sunuyor. 
* [annotations](#annotations)
* [attributes(Controller oluşturunca methodda tanımlı olarak gelir)](#attributes)
* [yaml(5.2'den sonra varsayılan olarak geliyor)](#yaml)
* **xml** => Bu bölümü anlatmayacağım, diğerleriyle kurulumu vs benzer.
* [php](#php)
## annotations
`annotations`(Açıklamalar), methodun üzerinde yazılır.  
Basit bir örnek:
```php
/**
* @Route("/", name="home")
*/
  public function index(): Response
    {
      return "Home";
    }
```
`@Route()` içine koşullar ve parametreler yazılır. Tabii sadece 2 parametresi yok diğer yöntemlerde kullanılan parametrelere de izin veriliyor. 
Paramatre ile örneklendirip bu başlığı bitirecem.
Örnek:
```php
/**
* @Route("/delete/post/{id}", name="post.delete", methods={"DELETE"}, requirements={"id"="\d+"})
* Burada /delete/post/{id}, gönderi id'sini, sadece tamsayı(regexp) ve HTTP POST yöntemi ile kabul edeceğimizi belirttik.
*/
  public function index(int $id): Response
    {
      return "Home";
    }
```
## attributes
`attributes`(Nitelikler), PHP 8 ile gelen yeni bir özellik, symfony'de boş durmayıp bunu Rota olarak kullanabilmemiz için bize sunmuş.
Kullanıma geçelim: 
```php
  #[Route('/delete/post/{id}', name: 'post.delete', methods: ['DELETE'], requirements: ['id' => '\d+'])]
  public function index(int $id): Response
  {
    return "Home";
  }
```
> Symfony attributes'leri öneriyor.

## Yaml
`yaml`, symfony 5.2'den sonra varsayılan olarak yüklenir. Yani php ve xml'i kendiniz yapılandırmanız gerekli, Yapılandırmayı [bölümün sonunda](#rota-yapılandırması) anlatmış olacağım.
`routes.yaml`, `config/routes.yaml` içerisinde bulunuyor. İlk kurulumda dosyayı açtığımızda:
```yml
1 index:
2     path: /
3     controller: App\Controller\DefaultController::index
```
Bizi bu metin karşılıyor. 1. satırdaki index, rotaya verilen isim(benzersiz olmalı aksi takdirde sorunlar çıkar) , 2. satırda uri'i işaret ediyor. 3. ise aksiyon yani controller'i en sonda ise `::` koyarak yöntem adınız yazıyoruz.
```yml
  post.delete:
    path: /delete/post/{id}'
    controller: App\Controller\BlogController::list
    requirements:
      page: '\d+'
```
## php
`routes.php`, `config/routes.php` içerisinde.
```php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('post.delete', '/delete/post/{id}')
    ->controller([\App\Controller\BlogController::class, 'index'])
    ->methods(['DELETE'])
    ->requirements([
        'id' => '\d+'
    ])
    ;
};
```
Tüm yöntemlerde yaptığım işlemler aynıdır.
ARTIK HANGİSİNİ KULLANMAK İSTERSENİZ SİZE KALMIŞ. BEN PHP İLE DEVAM EDECEĞİM.

# Rota yapılandırması
Rota dosyalarının yapılandırmasını ve yüklenmesini anlatacağım.
`src/Kernel.php` dosyasından ayarlamalar yapılıyor.
```php
    protected function configureRoutes(RoutingConfigurator $routes): void
    {
      $routes->import('../config/{routes}/'.$this->environment.'/*.yaml');
      // Burdan dosya adını yazın
      $routes->import('../config/{routes}/*.php');

      // burdaki dosya ise 
      if (is_file(\dirname(__DIR__).'/config/routes.php')) {
        // bunu yükler
          $routes->import('../config/{routes}.php');
      } else {
          // Değilse bunu yükleyecek
          $routes->import('../config/{routes}.yaml');
      }
    }
```
