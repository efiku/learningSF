<?php
use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;
/**
 * @var ClassLoader $loader
 */
$loader =  require "/home/vagrant/symfony/vendor/autoload.php";
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
