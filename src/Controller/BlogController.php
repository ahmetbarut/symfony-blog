<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\CreatePostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    public function create(): Response
    {   
        $form = $this->createForm(CreatePostType::class);
        
        return $this->render('blog/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
