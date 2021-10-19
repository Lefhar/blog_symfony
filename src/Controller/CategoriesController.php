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
     * @Route("/categories/{slug}", name="category")
     */
    public function index(Request $request): Response
    {
        // affichage de la page categorie
        $repo = $this->getDoctrine()->getRepository(Category::class);
        $repoart = $this->getDoctrine()->getRepository(Articles::class);

        $requests = Request::createFromGlobals();
 echo 'categorie'.$requests->attributes->get('slug','spoiler');
 var_dump($request);
        $article = $repoart->findByExampleField($requests->attributes->get('slug','spoiler'));
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