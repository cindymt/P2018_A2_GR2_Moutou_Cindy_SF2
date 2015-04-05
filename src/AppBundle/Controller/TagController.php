<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ArticleRepository;
use AppBundle\Entity\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
/**
 * TagController
 * @Route ("/Tag")
 */
class TagController extends Controller
{
    /**
     * @Route("/tag/{name}/{id}", name="tag", defaults={"id" = null}, requirements={"id" = "\d+"})
     *
     * @Method("GET")
     *
     */
    public function tagAction($name, $id)
    {

        $em = $this->getDoctrine()->getManager();
        /** @var TagRepository $repo */
        $repo = $em->getRepository('AppBundle:Tag')->findOneBy(['name' => $name]);
        $idtag = $repo->getId();
        /** @var ArticleRepository $tagrepo */
        $tagrepo = $em->getRepository('AppBundle:Article');
        $tag = $tagrepo->findbyTag($idtag);
        return $this->render('AppBundle:Article:showTag.html.twig', [
            'tags' => $tag,
            'name' => $name,
        ]);
    }
}

