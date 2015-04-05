<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TagRepository;
use AppBundle\Entity\ArticleRepository;
use AppBundle\Entity\UserRepository;
use AppBundle\Entity\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiController
 *
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/tag/{id}", name="api_tag", defaults={"id" = null}, requirements={"id" = "\d+"})
     */
    public function tagAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var TagRepository $repo */
        $repo = $em->getRepository('AppBundle:Tag');
        $tag = $repo->findCatchThemAll($id);
        return new JsonResponse($tag);
    }

    /**
     * @Route("/article/{id}", name="api_article", defaults={"id" = null}, requirements={"id" = "\d+"})
     */
    public function articleAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var ArticleRepository $repo */
        $repo = $em->getRepository('AppBundle:Article');
        $article = $repo->findCatchThemAll($id);
        return new JsonResponse($article);
    }

    /**
     * @Route("/user/{id}", name="api_user", defaults={"id" = null}, requirements={"id" =  "\d+"})
     */
    public function userAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var UserRepository $repo */
        $repo = $em->getRepository('AppBundle:User');
        $tag = $repo->findCatchThemAll($id);
        return new JsonResponse($tag);
    }

    /**
     * @Route("/category/{id}", name="api_category", defaults={"id" = null}, requirements={"id" =  "\d+"})
     */
    public function categoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //var_dump($id);die;
        /** @var CategoryRepository $repo */
        $repo = $em->getRepository('AppBundle:Category');
        $category = $repo->findCatchThemAll($id);
        return new JsonResponse($category);
    }

}
