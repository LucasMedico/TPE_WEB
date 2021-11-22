<?php

require_once('View.php');

class CategoryView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showCategorias($listaCategorias) {
        $this->getSmarty()->assign('title', "Categorias");
        $this->getSmarty()->assign('error', null);
        $this->getSmarty()->assign('listaCategorias',$listaCategorias);        
        $this->getSmarty()->display('templates/tablaCategorias.tpl');
    }

    public function deleteCategoria($categoria) {
        $this->getSmarty()->assign('title', "Categoia");
        $this->getSmarty()->assign('error', null);
        $this->getSmarty()->assign('categoria',$categoria);        
        $this->getSmarty()->display('templates/Producto.tpl');
    }

    public function showFormCategory($error, $id) {
        $this->getSmarty()->assign('title', "Editar Categoria");
        $this->getSmarty()->assign('error', $error); 
        $this->getSmarty()->assign('id', $id); 
        $this->getSmarty()->assign('inicio', BASE_URL.'inicio');
        $this->getSmarty()->display('templates/formEditCat.tpl');
    }

    public function showFormAddCategory($error) {
        $this->getSmarty()->assign('title', "Agregar Categoria");
        $this->getSmarty()->assign('error', $error); 
        $this->getSmarty()->assign('inicio', BASE_URL.'inicio');
        $this->getSmarty()->display('templates/formAddCat.tpl');
    }
    
}