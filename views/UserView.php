<?php

require_once('View.php');

class UserView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showLogin($error=null) {
        $this->getSmarty()->assign('title', "Login");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('inicio', BASE_URL.'inicio');
        $this->getSmarty()->display('templates/login.tpl');
    }

    public function showRegistro($error=null) {
        $this->getSmarty()->assign('title', "Registro");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('inicio', BASE_URL.'inicio');
        $this->getSmarty()->display('templates/registro.tpl');
    }
    
    public function showPerfilUsuario($userData) {
        $this->getSmarty()->assign('title', "Perfil");
        $this->getSmarty()->assign('error',null);        
        $this->getSmarty()->assign('inicio', BASE_URL.'inicio');
        $this->getSmarty()->assign('userData',$userData);
        $this->getSmarty()->display('templates/perfilUsuario.tpl');
    }
    
    function showUsuarios($listaUsuarios) {
        $this->getSmarty()->assign('inicio',BASE_URL.'inicio');
        $this->getSmarty()->assign('listaUsuarios',$listaUsuarios);
        $this->getSmarty()->display('templates/tablaUsuarios.tpl');
    }  
}