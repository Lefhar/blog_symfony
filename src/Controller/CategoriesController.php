<?php

namespace App\Controller;
use App\Entity\Articles;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class CategoriesController extends  AbstractController
{
    /**
     * @Route("/categories/{name}", name="category")
     */
    public function index(string $name): Response
    {
        echo $name;
        // affichage de la page categorie
        $repo = $this->getDoctrine()->getRepository(Category::class);
        $repoart = $this->getDoctrine()->getRepository(Articles::class);
//print_r($request->attributes->get('articles'));
//        $routeName = $request->attributes->get('_route');
    //    $routeParameters = $request->attributes->get('_route_params');

    //    var_dump($routeName);
        $article = $repoart->findByExampleField($name);
//        $em = $this->getDoctrine()->getManager();
//        $qb = $em->createQuery('SELECT * FROM articles art  JOIN category cat on cat.id = art.articles_id where cat.name=:cate')
//            ->setParameter('cate', $request)
//            ->getResult()
//        ;

        $categories = $repo->findAll();
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'post'=> $article,
            'categories'=> $categories
        ]);
    }
}