<?php

require_once('View.php');

class ProductView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showProductos($listaProductos,$listaCategorias) {
        $this->getSmarty()->assign('title', "Productos");
        $this->getSmarty()->assign('error', null);
        $this->getSmarty()->assign('listaProductos',$listaProductos); 
        $this->getSmarty()->assign('listaCategorias', $listaCategorias);  
        $this->getSmarty()->display('templates/tablaProductos.tpl');
    }

    public function showProducto($producto) {
        $this->getSmarty()->assign('title', "Producto");
        $this->getSmarty()->assign('error', null);
        $this->getSmarty()->assign('producto',$producto);        
        $this->getSmarty()->display('templates/producto.tpl');
    }

    public function showFormProducto($error, $listaCategorias, $id) {
        $this->getSmarty()->assign('title', "Editar Producto");
        $this->getSmarty()->assign('error', $error); 
        $this->getSmarty()->assign('listaCategorias', $listaCategorias); 
        $this->getSmarty()->assign('id', $id); 
        $this->getSmarty()->assign('inicio', BASE_URL.'inicio');
        $this->getSmarty()->display('templates/formEditProd.tpl');
    }

    public function showFormAddProduct($error, $listaCategorias) {
        $this->getSmarty()->assign('title', "Agregar Producto");
        $this->getSmarty()->assign('error', $error); 
        $this->getSmarty()->assign('listaCategorias', $listaCategorias); 
        $this->getSmarty()->assign('inicio', BASE_URL.'inicio');
        $this->getSmarty()->display('templates/formAddProd.tpl');
    }
}