<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
/**
 * CategoryController
 * @Route ("/Category")
 */
class CategoryController extends Controller
{
    /**
     * @Route("/category/{name}/{id}", name="category", defaults={"id" = null}, requirements={"id" = "\d+"})
     *
     * @Method("GET")
     *
     */
    public function categoryAction($name, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Category')->findOneBy(['name' => $name]);
        $category = $em->getRepository('AppBundle:Article')->findBy(['category' => $repo]);
        return $this->render('AppBundle:Article:showCategory.html.twig', [
            'category' => $category,
            'name' => $name,
        ]);
    }

}
