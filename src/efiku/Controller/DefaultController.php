<?php

namespace efiku\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;

class DefaultController extends Controller implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function helloAction()
        {

            return $this->container->get("templating")->renderResponse('index.html.twig', [
                'version' =>  Kernel::VERSION
            ], new Response());
        }

}
