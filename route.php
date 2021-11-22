<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once('controllers/UserController.php');
require_once('controllers/ProductController.php');
require_once('controllers/CategoryController.php');
require_once('controllers/InicioController.php');


if ($_GET['action'] == '')
	$_GET['action'] = 'inicio';

$urlParts = explode('/', $_GET['action']);

$userController = new UserController();
$inicioController = new InicioController();
$productController = new ProductController();
$categoryController = new CategoryController();


switch ($urlParts[0]) {

	case 'inicio':
		$inicioController->ShowHome();
		break;
		
	case 'verify':
		$userController->verify();
		break;	
	
	case 'login':
		$userController->showLogin();
		break;

	case 'registro':
		$userController->showRegistro();
		break;

	case 'registrar':
		$userController->registrar();
		break;

	case "logout":
		$userController->logout();
		break;

	case "perfilUsuario":
		$userController->showPerfilUsuario();
		break;

	case 'usuarios':
		$userController->showUsuarios();
		break;

////// ADMINISTRACION DE PRODUCTOS //////

	//Listado de ítems: Se debe poder visualizar todos los items cargados
	case "tablaProductos":
		$productController->showProductos();
		break;	

	//Detalle de ítem: Se debe poder navegar y visualizar cada ítem particularmente 	
	case "verProducto":
		$productController->showProducto($urlParts[1]);
		break;

	//Listado de ítems x categoría: Se debe poder visualizar los ítems perteneciente a una categoría seleccionada	
	case "verPorCategoria":
		$productController->showPorCategoria();
		break;

	case "borrarProducto":
		$productController->deleteProducto($urlParts[1]);
		break;
		
	case "formProducto";
		$productController->showFormProduct($urlParts[1]);
		break;

	case "editarProducto";
		$productController->editProduct($urlParts[1]);
		break;

	case "formAddProducto";
		$productController->showFormAddProduct();
		break;

	case "agregarProducto";
		$productController->addProduct();
		break;		
////// ADMINISTRACION DE CATEGORIAS //////

	//Listado de categorías: Se debe poder visualizar un listado con todas las categorías cargadas
	case "tablaCategorias":
		$categoryController->showCategorias();
		break;	

	case "eliminarCategoria":
		$categoryController->deleteCategoria($urlParts[1]);
		break;

	case "formCategoria";
		$categoryController->showFormCategory($urlParts[1]);
		break;

	case "editarCategoria";
		$categoryController->editCategory($urlParts[1]);
		break;

	case "formAddCategoria";
		$categoryController->showFormAddCategory();
		break;

	case "agregarCategoria";
		$categoryController->addCategory();
		break;		
////////////// ZONA DE ADMINISTRACION DE USUARIOS ////////

	case "bajaAdmin":
		$userController->bajaAdmin($urlParts[1]);
		break;

	case "altaAdmin":
		$userController->altaAdmin($urlParts[1]);
		break;

	case "eliminarUser":
		$userController->deleteUser($urlParts[1]);
		break;
				
////////////// FIN ZONA DE ADMINISTRACION DE CATEGORIAS ////////

	default:
		echo '<h1>Error 404 - Page not found </h1>';
		break;
}