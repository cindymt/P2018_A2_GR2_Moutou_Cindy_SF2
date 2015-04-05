<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /** * @Route("/hello/world", name="hello_world") */
    public function helloWorldAction()
    {
        return new Response('Hello word');
    }
}
