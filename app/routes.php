<?php

// creamos la primera ruta
$app->get('/home', function($request, $response){
  //return 'homees';
   return $this->view->render($response, 'home.twig');
});

$app->get('/','HomeController:index');

?>
