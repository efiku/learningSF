<?php

namespace efikuBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;

class DefaultController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function indexAction()
    {
        $lottoNumbers = range(1, 9);
        $vendorSize = $this->container->get("directory.tool")->getDirectorySize("/home/vagrant/symfony/vendor");

        return $this->container->get("templating")->renderResponse('index.html.twig', [
            'version' => Kernel::VERSION,
            'lotto' => join(" ", $lottoNumbers),
            'vendor_size' => $vendorSize
        ], new Response());
    }

}
