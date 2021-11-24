<?php
require_once 'libs/Router.php';
require_once 'api/APIController.php';

// crea el router
$router = new Router();

// tabla de ruteo
// obtener comentarios de un producto.
$router->addRoute('comments/:ID', 'GET', 'APIController', 'getProductComments');
// postear un comentario.
$router->addRoute('comment', 'POST', 'APIController', 'newProductComment');
// borrar un comentario.
$router->addRoute('comment/:ID', 'DELETE', 'APIController', 'deleteProductComment');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

