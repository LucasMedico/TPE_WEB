<?php

include_once('views/ProductView.php');
include_once('models/ProductModel.php');
include_once('helpers/auth.helper.php');

class ProductController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function showProductos() {
        $listaProductos =$this->model->getAll();
        $listaCategorias = $this->model->getCategorias();
        $this->view->showProductos($listaProductos,$listaCategorias);
    }

    public function showProducto($id) {
        $producto =$this->model->getProductById($id);
        $this->view->showProducto($producto);
    }

    public function deleteProducto($id) {     
        if (AuthHelper::isAdmin()){
            $this->model->deleteProducto($id);
            header("Location: " . BASE_URL . 'tablaProductos');
        }else
            header('Location: ' . BASE_URL . "inicio");
    }

    public function showPorCategoria() {
        $categoria= $_POST['Parametro_filtro'];
        $listaProductos =$this->model->getPorCategoria($categoria);
        $listaCategorias = $this->model->getCategorias();
        $this->view->showProductos($listaProductos,$listaCategorias);
    }


    public function showFormProduct($id) {
        if (AuthHelper::isAdmin()){
            $listaCategorias = $this->model->getCategorias();
            $this->view->showFormProducto(null, $listaCategorias, $id);
        }else
            header('Location: ' . BASE_URL . "inicio");
    }    

    public function editProduct($id) {
        if (AuthHelper::isAdmin()){
            $producto= $_POST['Parametro_producto'];
            $precio= $_POST['Parametro_precio'];
            $detalle = $_POST['Parametro_detalle'];
            $categoria = $_POST['Parametro_categoria'];
            $this->model->editProduct($id, $producto, $precio, $detalle, $categoria);
            header("Location: " . BASE_URL . 'tablaProductos');
        }else
            header('Location: ' . BASE_URL . "inicio");
    }

    public function showFormAddProduct() {
        if (AuthHelper::isAdmin()){
            $listaCategorias = $this->model->getCategorias();
            $this->view->showFormAddProduct(null, $listaCategorias);
        }else
            header('Location: ' . BASE_URL . "inicio");
    }  

    public function addProduct() {
        if (AuthHelper::isAdmin()){
            $producto= $_POST['Parametro_producto'];
            $precio= $_POST['Parametro_precio'];
            $detalle = $_POST['Parametro_detalle'];
            $categoria = $_POST['Parametro_categoria'];
            $this->model->addProduct($producto, $precio, $detalle, $categoria);
            header("Location: " . BASE_URL . 'tablaProductos');
        }else
            header('Location: ' . BASE_URL . "inicio");
    }

}