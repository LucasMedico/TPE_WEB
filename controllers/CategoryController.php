<?php

include_once('views/CategoryView.php');
include_once('models/CategoryModel.php');
include_once('helpers/auth.helper.php');

class CategoryController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function showCategorias() {
        $listaCategorias =$this->model->getAll();
        $this->view->showCategorias($listaCategorias);
    }
 
    public function deleteCategoria($id) {     
        if (AuthHelper::isAdmin()){
            $prodABorrar = $this->model->getCategoryById($id);
            $this->model->deleteCategoria($id);
            header("Location: " . BASE_URL . 'tablaCategorias');
        }else
            header('Location: ' . BASE_URL . "inicio");
    }

    public function showFormCategory($id) {
        if (AuthHelper::isAdmin()){
            $this->view->showFormCategory(null, $id);
        }else
            header('Location: ' . BASE_URL . "inicio");
    }    

    public function editCategory($id) {
        if (AuthHelper::isAdmin()){
            $nombre= $_POST['Parametro_Nombre'];
            $this->model->editCategoria($id, $nombre);
            header("Location: " . BASE_URL . 'tablaCategorias');
        }else
            header('Location: ' . BASE_URL . "inicio");
    }

    public function showFormAddCategory() {
        if (AuthHelper::isAdmin()){
            $this->view->showFormAddCategory(null);
        }else
            header('Location: ' . BASE_URL . "inicio");
    }  

    public function addCategory() {
        if (AuthHelper::isAdmin()){
            $nombre= $_POST['Parametro_Nombre'];
            $unidades= $_POST['Parametro_Unidades'];
            $apto= $_POST['Parametro_Vegan'];
            $this->model->addCategoria($nombre,$unidades,$apto);
            header("Location: " . BASE_URL . 'tablaCategorias');
        }else
            header('Location: ' . BASE_URL . "inicio");
    }
}