Öncelikle bir `controller`'e ihtiyacım var onu oluşturmam gerekiyor.
```shell
    php bin/console make:controller BlogController
```
Eğer `controller` oluşturmaya çalışınca bu hatayı alıyorsanız:
```shell
  There are no commands defined in the "make" namespace.                                                
                                                                                                        
  You may be looking for a command provided by the "MakerBundle" which is currently not installed. Try  
   running "composer require symfony/maker-bundle --dev".                                               
```
ilk önce `composer require symfony/maker-bundle --dev` bu komutu çalıştırın paketi kursun ardından `.env` dosyasına girip `APP_ENV`'i `dev` yapın. Bu şekilde paket sadece geliştirme ortamında kurulur. Eğer siz üretimde de kullanmak istiyorsanız
 `composer require symfony/maker-bundle` komutunu çalıştırın öncesi geliştirme olarak kurdu. 
 `config/bundles.php` dosyasından :
```php
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['all' => true],
```
`['all' => true]` yani sadece geliştirme ortamı değil. 


Yola devam edelim `make:controller` komutunu çalıştırdıktan sonra hem `controller` hemde template'i oluşturdu. Şimdi yönlendirmeyi yapalım.