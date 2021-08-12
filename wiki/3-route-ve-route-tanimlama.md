- [Başlangıç](#başlangıç)
- [Rota Oluşturma](#rota-oluşturma)
  - [PHP Dosyasında Rota Oluşturma](#php-dosyasında-rota-oluşturma)
  - [Route Parametreleri](#route-parametreleri)
  - [Parametre Doğrulama](#parametre-doğrulama)
# Başlangıç
Symfony'de rotaların nasıl tanımlandığını ve düzenlendiğini [bu bölümde](1-baslangic.md#router) anlattım. Eğer sıfırdan başlıyorsanız [bu bölümü](1-baslangic.md) detaylı okumanızı tavsiye ederim. Temel konuları içeriyor.


# Rota Oluşturma
Öncelikle basit bir şekilde sadece `controller` dosyasını yükleyelim. Yeni bir controller oluşturmak [için bu bölüme bakınız](4-controller.md)

## PHP Dosyasında Rota Oluşturma
`controller` yöntemi, dizi kabul eder, dizinin 1. parametresi sınıf adı 2. parametre ise yöntemin adı. Dizi değilde sadece sınıf adını verirseniz `controller` içinde `__invoke` yöntemini arayacaktır, bulmadığı takdirde size hata döndürür. Eğer yönteme dizi verip ve dizinin 2. parametresine yöntem verilmezse yine hata döndürür.

add yöntemi, rotaya isim ve yol atamanızı sağlıyor, controller'de hangi controlleri yükleyeceğinizi ve methods, dizi kabul eder
```php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $route){
    $route->add('home', '/')
        ->controller([\App\Controller\BlogController::class, 'index'])
        ->methods(['get']);
};
```
## Route Parametreleri
Önceki örnek değişmeyen rotalar içindi şimdi dinamik url'imiz olacak. 
Parametre eklemek için süslü parantezler `{}` kullanılır. Süslü parantezlerin arasında yazdığınız parametre adı, controller'da tanımladığınız değişken adıyla aynı olmalıdır.
Örnek:
```php
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