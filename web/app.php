<?php
use Symfony\Component\HttpFoundation\Request;
require_once __DIR__ . '/../app/autoload.php';
require __DIR__.'/../app/MicroKernel.php';
$kernel = new MicroKernel('dev', true);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
