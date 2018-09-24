<?php

namespace App\Controllers;

class Controller
{

  protected $container;

  // metodo constructor principal de los controladores, trae el objeto container
  //  que contiene las vistas
  public function __construct($container)
  {
    $this->container = $container;
  }

 // verifica si los objetos usados en los get existen en el $container
 //  medida de seguridad
  public function __get($property)
  {
    if($this->container->{$property}){
      return $this->container->$property;
    }
  }

}

?>
