<?php

include_once('views/UserView.php');
include_once('models/UserModel.php');
include_once('helpers/auth.helper.php');

class UserController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function showPerfilUsuario() {
        $authHelper = new AuthHelper();
        $userData = $authHelper->getAlltUserData();
        $this->view->showPerfilUsuario($userData);
    }

    public function showRegistro() {
        $this->view->showRegistro();
    }    

    public function registrar() {
        $usuario= $_POST['str_usuario'];
        $pass = $_POST['pass_contraseña'];
        $existe = $this->model->getUserByUsername($usuario);
        if ( $existe == null)
        {
            $this->model->add($usuario, $pass);
            $userDb = $this->model->getUserByUsername($usuario);
            AuthHelper::login($userDb);
            header("Location: " . BASE_URL . 'inicio');
        }
        else{
            header("Location: " . BASE_URL . 'registro');
        }
    }

    public function verify() {
        if(!empty($_POST['str_usuario']) && !empty($_POST['pass_contraseña'])) {
            $user = $_POST['str_usuario'];
            $pass = $_POST['pass_contraseña'];
            $userDb = $this->model->getUserByUsername($user);
            if (!empty($userDb) && password_verify($pass, $userDb->contraseña))
            {
                AuthHelper::login($userDb);
                header('Location: ' . BASE_URL . "inicio");
            } else 
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }

    public function logout() {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'inicio');
    }

    function showUsuarios() {
        if (AuthHelper::isAdmin()){
            $listaUsuarios = $this->model->getAll();
            $this->view->showUsuarios($listaUsuarios);
        }else{
            header("Location: " . BASE_URL . 'inicio');
        }
    }  
  

    function bajaAdmin($id)
    {  
        $admins = $this->model->countAdmin();
        if ($admins->total > 1){
            $this->model->bajaAdmin($id);
            header("Location: " . BASE_URL . 'usuarios');
        }else{
            header("Location: " . BASE_URL . 'usuarios');
        }
    }

    function altaAdmin($id)
    {
        $this->model->altaAdmin($id);
        header("Location: " . BASE_URL . 'usuarios');
    }

    function deleteUser($id)
    {   
        $usuarioABorrar = $this->model->getUserByID($id);
        if ($usuarioABorrar->esAdmin == 0){
            $this->model->deleteUser($id);
            header("Location: " . BASE_URL . 'usuarios');
        }else{
                $admins = $this->model->countAdmin();
                if ($admins->total > 1){
                    $this->model->deleteUser($id);
                    header("Location: " . BASE_URL . 'usuarios');
                }else{
                    header("Location: " . BASE_URL . 'usuarios');
            }
        }  
    }
}