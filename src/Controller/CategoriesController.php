<?php

namespace App\Controller;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class CategoriesController extends  AbstractController
{
    /**
     * @Route("/categories/{slug}", name="category")
     */
    public function index(Request $request): Response
    {
        // affichage de la page categorie
        $repo = $this->getDoctrine()->getRepository(Category::class);
        $category = $repo->findBy(['name'=>$request]);
        $categories = $repo->findAll();
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'category'=> $category,
            'categories'=> $categories
        ]);
    }
}