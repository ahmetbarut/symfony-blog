# Controller
`Denetleyici` yada `controller`, ben `controller` diyeceğim.
`controller`ler `src/Controller` dizini içerisinde bulunur. `Controller`'i ister kendiniz yeni dosya oluşturarak veya `php console/bin make:controller ControllerAdı` komutunu yazarakta oluşturabilirsiniz. Komutu çalıştırarak oluşturursanız, `twig` şablonu da oluşturur. İsterseniz hemen deneyin. 

```shell 
    php console/bin make:controller HomeController
```
Bu şekilde çıktı aldım: 
```shell
created: src/Controller/HomeController.php
created: templates/home/index.html.twig
```

Şablona ihtiyacınız yoksa eğer `--no-template` bayrağını ekleyin:
```shell
    php bin/console make:controller BlogController --no-template
```
Bu şekilde sadece `controller` oluşturacaktır.

`Controller` üzerinden şablon ve veri döndürmek için `render` yöntemi kullanacağız.

```php
    public function index(): Response
    {
        return $this->render('index.html.twig', ["mesaj" => "Merhaba Symfony!"]);
    }
```

Ben [bu şablonu](https://github.com/welisonmenezes/wm-simple-blog-template) alıp parçaladım ve kullanıyorum. Parçalama işlemini ve `twig`i ayrıyeten anlatmayı düşünmüyorum.