<?php

namespace App\Controller;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class CategoriesController extends  AbstractController
{
    /**
     * @Route("/categories", name="category")
     */
    public function index(): Response
    {
        // affichage de la page categorie
        $repo = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repo->findAll();
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'category'=> $categories
        ]);
    }
}