<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\CreatePostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{   
    /**
     * Blogun anasayfasını döndürür.
     * @return Response
     */
    public function index(): Response
    {
        $post = $this->getDoctrine()->getManager()->getRepository(Post::class);

        return $this->render('index.html.twig', [
            'posts' => $post->findAll()
        ]);
    }

    /**
     * Blog gönderisi ekleme sayfasını döndürür. 
     *
     * @return Response
     */
    public function create(): Response
    {   
        /*
         |--------------------------------------------------------------------|
         | Burda ilk yaptığım şey view için bir form oluşturmaktır. 
         | Belgelerde wiki/ klasörü içinde detaylı bir şekilde anlatılmıştır.
         | "createForm" yöntemi, FormType alır. make:form komutunu 
         | yürüttünce ve Entity adını yazarsanız form sınıfını ordaki 
         | değerlere göre otomatik olarak doldurur, yani sizin yeniden form
         | ve doğrğulama yazmanıza gerek kalmaz hatta veritabanına kadar
         | herşeyi kendi içinde hallediyor.
         |-------------------------------------------------------------------|
         */
        $form = $this->createForm(CreatePostType::class, null,[
            'action' => $this->generateUrl('blog.store'),
        ]);

        /*
        |----------------------------------------------------------------|
        | Burda "render" yönteminde, oluşturduğum formu şablona iletmem
        | gerekiyorki orda kullanabileyim. Şöyle birşey daha var post ve 
        | category adında 2 tablom var bunların birbirleriyle ilişkisi var
        | form sınıfını kullandığım için formType otomatik olarak foreignKey'i
        | kendi çekiyor ve forma yerleştiriyor. 
        |----------------------------------------------------------------|
        */
        return $this->render('blog/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Blog gönderilerini kaydeder.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        /*
        |------------------------------------------------------------|
        | "$form" Kullanıcıdan gelen formu alabilmek için öncelikle Form 
        | oluşturmamız gerekiyor. 
        | "$post" içinde ise veritabanına kaydetmemiz için doctrine
        | yöntemini de çağırmamız gerekli.
        |------------------------------------------------------------|
        */
        $form = $this->createForm(CreatePostType::class);

        $post = $this->getDoctrine()->getManager();

        // Burda formu inceler, form gönderilmiş ve onaylanmış ise devam eder,
        // Onay almamışsa geriye döner ve hataları basar.
        $form->handleRequest($request);
        
        // Gönderilmiş ve doğrulanmışsa
        if ($form->isSubmitted() && $form->isValid()) { 

            // Burda veritabanına kaydetmek için kuyruğa alır.
            $post->persist($form->getData());

            // Kuyruğu temizler, yani veritabanına ekler. Olası hata durumunda error alırsınız zaten.
            $post->flush();
            
            // İşimiz bitti artık anasayfaya gidebiliriz.
            return $this->redirectToRoute('home');
        }
        
        // Form, onay almamışsa, blog oluşturmak için geri döndürür. 
        // Form hatalarını şablonda görünmesi için formu tekrar geriye döndürmek zorundasınız.
        return $this->render('blog/create.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
