<?php
use efiku\efikuBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class MicroKernel extends Kernel
{
    use MicroKernelTrait;


    public function registerBundles()
    {
        return
            [
                new FrameworkBundle(),
                new efikuBundle(),
                new TwigBundle()
            ];
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->add('/', "efikuBundle:Default:hello");
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'micr0',
            'templating' => [
                'engines' => [
                    'twig'
                ]
            ]
        ]);

        $c->loadFromExtension('twig', [
            // ...
            'paths' => [
                '%kernel.root_dir%/../src/efiku/Resources' => null,
            ],
        ]);
    }
}
