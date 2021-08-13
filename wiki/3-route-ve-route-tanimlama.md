- [Başlangıç](#başlangıç)
- [Rota Oluşturma](#rota-oluşturma)
  - [PHP Dosyasında Rota Oluşturma](#php-dosyasında-rota-oluşturma)
- [Route Parametreleri](#route-parametreleri)
  - [Parametre Doğrulama](#parametre-doğrulama)
  - [Opsiyonel Parametreler](#opsiyonel-parametreler)
# Başlangıç
Symfony'de rotaların nasıl tanımlandığını ve düzenlendiğini [bu bölümde](1-baslangic.md#router) anlattım. Eğer sıfırdan başlıyorsanız [bu bölümü](1-baslangic.md) detaylı okumanızı tavsiye ederim. Temel konuları içeriyor.


# Rota Oluşturma
Öncelikle basit bir şekilde sadece `controller` dosyasını yükleyelim. Yeni bir controller oluşturmak [için bu bölüme bakınız](4-controller.md)

## PHP Dosyasında Rota Oluşturma
`controller` yöntemi, dizi kabul eder, dizinin 1. parametresi sınıf adı 2. parametre ise yöntemin adı. Dizi değilde sadece sınıf adını verirseniz `controller` içinde `__invoke` yöntemini arayacaktır, bulmadığı takdirde size hata döndürür. Eğer yönteme dizi verip ve dizinin 2. parametresine yöntem verilmezse yine hata döndürür.

add yöntemi, rotaya isim ve yol atamanızı sağlıyor, controller'de hangi controlleri yükleyeceğinizi ve methods, dizi kabul eder
```php
// config/routes.php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('home', '/')
        ->controller([\App\Controller\BlogController::class, 'index'])
        ->methods(['get']);
};
```
# Route Parametreleri
Önceki örnek değişmeyen rotalar içindi şimdi dinamik url'imiz olacak. 
Parametre eklemek için süslü parantezler `{}` kullanılır. Süslü parantezlerin arasında yazdığınız parametre adı, controller'da tanımladığınız değişken adıyla aynı olmalıdır.
Örnek:
```php
// config/routes.php
return function(RoutingConfigurator $route){
    $route->add('home', '/{category}')
        ->controller([\App\Controller\BlogController::class, 'index'])
        ->methods(['get']);
    };
```
Rotada birden fazla parametre tanımlaya izin verilir ancak her parametrenin benzersiz bir isme sahip olmalıdır. Örn: `/{category}/{page}`

## Parametre Doğrulama
Aynı url'e sahip ama farklı yöntemlerde 2 sayfamızın olduğunu düşünelim ve burda gelecek olan parametrelerden 1 tanesinin tam sayı diğerininde sözcük aldığını varsayalım burda bunları ayırt etmek için ekstradan bişeyler yapmamız gerekirdi fakat burda bize `requirements` yöntemi çok yardımcı oluyor.
Örn:
```php
// config/routes.php
return function(RoutingConfigurator $route){
    $route->add('home', '/gonderi/{page}')
        ->controller([\App\Controller\BlogController::class, 'page'])
        ->methods(['get'])
        ->requirements(['page' => '\d+'])
        ;

    $route->add('home', '/gonderi/{slug}')
        ->controller([\App\Controller\BlogController::class, 'show'])
        ->methods(['get'])
        ;
    };
```
`requirements` yönteminde url'in eşleşmesi için php düzenli ifadeleri kullandık burda `\d+` ifadesi tam sayı ve herhangi bir uzunluğa sahip karakterleri kabul eder.   

## Opsiyonel Parametreler
Bazı durumlarda parametreyi boş göndermemiz gerekebiliyor, önceki örneklerde parametrenin eşleşmesi gerekli aksi takdirde eşleşme olmadığı için hata verecektir. Şimdi buna örnek verelim:

```php
// config/routes.php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('post', '/gonderi/{id}/{slug}')
        ->controller([\App\Controller\BlogController::class, 'show'])
        ->methods(['get'])
        ->requirements(['user' => '\d+'])
        ->defaults(['user'=> 1])
        ;
};
```
Varsayılan olarak `1` verdim. Artık boş girildiğinde varsayılan değere yönlendirmeyi yapacak.

**!NOT**: Önceki parametreniz opsiyonel ise, sonraki parametrenizinde opsiyonel olması gereklidir aksi takdirde eşleşme sağlanamaz. Örnek `/kullanicilar/{user}/gonderiler` `$user` parametresi zorunlu olmalı, opsiyonel olamaz. 

Parametreleri satır içi de yapabilir. Örn: `/{parametre?değer}`, eğer boş girilirse `?` soru işaretinden sonraki değer varsayılan olarak gider. Parametreyi tamamen boş göndermek istiyorsanız `{parametre?}` parametrenin sonuna soru işareti `?` koymanız gerekli ve ardından yüklemeye çalıştığınız yöntemin parametresinde de bunu belirtmeniz gerekli. Örn : `/kullanicilar/{user?}` ve `?string $user` şeklinde olmalı veya parametrenin veri türü belirsiz ise `$user=null` yapabilirsiniz. 
