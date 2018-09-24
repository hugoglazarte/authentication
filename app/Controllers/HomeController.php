<?php

// creamos el namespace para conectar con la app
namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{

  // a traves de la propiedad container de la clase padre y de ahi llamamos a las vistas
  public function index($request, $response)
  {
    return $this->container->view->render($response, 'home.twig');
  }
}

?>
