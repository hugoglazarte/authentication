<?php

// cargamos la sesion
session_start();

// requerimos la libreria de slim
require __DIR__ . '/../vendor/autoload.php';

// creamos la app
$app = new \Slim\App([
  'settings' => [
    'displayErrorDetails' => true,
  ]
]);

// creamos un contenedor que va a agrupar las herramientas que app va a usar
 $container = $app->getContainer();
//
$container['view'] = function($container){
  $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
    'cache' => false,
  ]);

  // extension para manejar rutas y vistas
  $view->addExtension(new \Slim\Views\TwigExtension(
    $container->router,
    $container->request->getUri()
  ));

  return $view;
};

$container['HomeController'] = function($container){
  return new \App\Controllers\HomeController($container);
  //HomeController($container->view); pasamos el controlador de vistas al
  //  homecontroller para usarlo desde ahi
};

// vamos a manejar las rutas con el sigui archivo
require __DIR__ . '/../app/routes.php';

?>
