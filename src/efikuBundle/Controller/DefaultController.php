<?php

namespace efikuBundle\Controller;

use efikuBundle\Entity\Items;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;

class DefaultController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function indexAction()
    {
        $vendorSize = $this->container->get("directory.tool")
            ->getDirectorySize(__DIR__."/../../../vendor/");

        $itemsCollection = $this->getEntityManager("efikuBundle:Items")->findAll();

        return $this->container->get("templating")->renderResponse('index.html.twig', [
            'version' => Kernel::VERSION,
            'vendor_size' => $vendorSize,
            'items' => $itemsCollection
        ], new Response());
    }

    private function getEntityManager($entityRepository){
        return $this->container->get("doctrine.orm.entity_manager")
            ->getRepository($entityRepository);
    }
}
