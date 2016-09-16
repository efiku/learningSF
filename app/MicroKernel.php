<?php
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;
use efikuBundle\efikuBundle;

class MicroKernel extends Kernel
{
    use MicroKernelTrait;


    public function registerBundles()
    {
        $bundles = [
            new FrameworkBundle(),
            new TwigBundle(),
            new efikuBundle(),
        ];

        if ($this->isDevelopmentMode() ) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        }

        return $bundles;
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        if($this->isDevelopmentMode()){
            $routes->mount('/_wdt', $routes->import('@WebProfilerBundle/Resources/config/routing/wdt.xml'));
            $routes->mount('/_profiler', $routes->import('@WebProfilerBundle/Resources/config/routing/profiler.xml'));
        }

        $routes->import(__DIR__ . "/config/routing.yml");
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        if($this->isDevelopmentMode()){
            $c->loadFromExtension('web_profiler', ['toolbar' => true]);
        }

        $loader->load(__DIR__ . '/config/framework.yml');
    }

    public function getCacheDir()
    {
        if ($this->isDevelopmentMode()) {
            return '/dev/shm/symfony/cache/' .  $this->environment;
        }

        return parent::getCacheDir();
    }

    public function getLogDir()
    {
        if ($this->isDevelopmentMode()) {
            return '/dev/shm/symfony/logs';
        }

        return parent::getLogDir();
    }

    private function isDevelopmentMode(){
        return in_array($this->getEnvironment(), array('dev', 'test'), true);
    }
}
