<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 16.09.16
 * Time: 10:09
 */

namespace efikuBundle\Services;


use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class DirectoryTweak
{

    public function getDirectorySize($directory = "")
    {
        $bytesTotal = 0;
        $path = realpath($directory);
        if ($path === false) {
            throw new FileNotFoundException("Directory \"$directory\" not exists!");
        }
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path,
            FilesystemIterator::SKIP_DOTS)) as $object) {
            $bytesTotal += $object->getSize();
        }
        return ceil($bytesTotal / 1024);

    }

}
