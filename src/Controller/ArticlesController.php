<?php

namespace App\Controller;
use App\Entity\Articles;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles")
     */
    public function index(): Response
    {
        // affichage de la page d'accueil
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $articles = $repo->findAll();
        $repo2 = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repo2->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles'=> $articles,
            'categories'=>  $categories
        ]);
    }
}