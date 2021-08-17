- [Giriş](#giriş)
- [Form Oluşturma](#form-oluşturma)
  - [Şablonda Kullanma](#şablonda-kullanma)
- [Form Türleri](#form-türleri)
- [Form Sınıfı Oluşturma](#form-sınıfı-oluşturma)
- [Form Helper](#form-helper)
  - [form](#form)
# Giriş 
Symfonyde formları kullanarak çoğu sorundan sizi kurtaracaktır. Doğrulamalar, formları oluşturma, verileri ekleme gibi gibi sorunlardan sizi kurtarır. Örneğin form sınıfını oluştururken `Entity/Model` sınıfına bağlarsanız, bütün alanları kendisi ekleyecek, zorunlu olanları belirtecek ve ilişkisel olan sütunları da çekecektir. Yani form kullanmanız sizi çok rahatlatabilir. İlk başlarda karışık ve zor gibi görünebilir ama ilerledikçe güzel olduğunu farkedeceksiniz.

# Form Oluşturma
Symfony'de formu ister bir modele bağlayın istersenizde formu kendi başına kullanın, bunda kısıtlama yok. Eğer `controller`'den formu oluşturmak istiyorsanız:
```php
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

public function index(Request $request)
{
    
$form = $this->createFormBuilder()
    ->setAction('/login') // bu yönteme göndermesini istyorum
    ->setMethod('POST') // Varsayılan yöntem de POST.
    ->add('username', TextType::class, ['label' => 'Kullanıcı Adı'])
    ->add('password', PasswordType::class, ['label' => 'Parola'])
    ->add('save', SubmitType::class, ['label' => 'Giriş Yap'])
    ->getForm()
    ;

    $form->handleRequest($request)  

    if ($form->isSubmitted() && $form->isValid()) {
        //
    }
    
    return $this->render('index.html.twig', ['form' => $form->createView()]);
}
```
## Şablonda Kullanma
Şablon'da formu bu şekilde gösterebiliriz:
```php
    {{ form(form) }}
```
Şimdi `controller` tarafından formu oluşturup `şablon`a ilettik ve kullandık. Muhtemelen size yabancı gelen, `TextType`, `PasswordType` ve `SubmitType`'dir. Bunlar form türü diye geçiyor. Bunları sonraki bölümde açıklamaya çalıştım. 
Şimdi formdaki bilgileri alalım ve kullanalım. Şablon kısmından formu incelelerseniz çoğu özelliği göreceksiniz. 

Bilgileri alalım:
```php
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

public function index(Request $request)
{
    
$form = $this->createFormBuilder()
    ->setAction('/login') // bu yönteme göndermesini istyorum
    ->setMethod('POST') // Varsayılan yöntem de POST.
    ->add('username', TextType::class, ['label' => 'Kullanıcı Adı'])
    ->add('password', PasswordType::class, ['label' => 'Parola'])
    ->add('save', SubmitType::class, ['label' => 'Giriş Yap'])
    ->getForm()
    ;

    $form->handleRequest($request)  

    if ($form->isSubmitted() && $form->isValid()) {
        // belgelerde, $request->request->get('username') diye öneriliyor fakat null dönüyor.
        $form->getData()['username']
        $form->getData()['password']
    }
    
    return $this->render('index.html.twig', ['form' => $form->createView()]);
}
```
Burda neler yaptık onu ele alacağız. Öncelikle formu `createFormBuilder` ile oluşturduk ve `handleRequest` yöntemi ile onu oluşturmuş olduğumuz form ile eşleştirdik ve doğruladık, sonrasında `isSubmitted` ve `isValid`, form doğrulanmış ve gönderilmişse bu 2 yöntem `true` döner.
Form doğrulanmazsa geriye hata mesajı döndürür fakat formu yeniden `render` etmemiz gerekli aksi takdirde hata mesajları görünmeyecektir.  

# Form Türleri 
Symfony'de formlar ve form alanları, form tip diye geçmektedir. Yani her input bir form türüdür. Örn: `<input type="text">`, bu `TextType` form tipidir. 
> [Daha Fazla Form Türü](https://symfony.com/doc/current/reference/forms/types.html)
# Form Sınıfı Oluşturma 
Symfony'de formu ister bir modele bağlayın istersenizde formu kendi başına kullanın, bunda kısıtlama yok. Hemen form sınıfımız oluşturalım ve örneklere başlayalım:
```shell
    php console/bin make:form LoginForm
```
Komutu çalıştırdıktan sonra `src/Form/LoginFormType.php` dosyasının oluştuğunu göreceksiniz.

# Form Helper
`twig` içinde form yardımcı fonksiyonları. 
| Parametre   | Açıklama    |
| ----------- | ----------- |
| `view`      | render edilen form       |
| `ozellik`   | Form'a eklenmesini istediğimiz form özellikleri. Örn: `method="POST"`        |
## form
`form` fonksiyonunu, genelde tam bir formu, özelleştirme istemeyen bir form oluşturmak için kullanılır. Örn: form için gereken bütün inputlar ve butonu girdiğinizi varsayalım, bunun için `form` fonksiyonunu kullanmanız yeterlidir.
kullanım : `{{ form(view, ozellik = opsiyonel) }}`

