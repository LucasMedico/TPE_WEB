<?php

require_once('libs/smarty/Smarty.class.php');

class InicioView extends View{

    function ShowHomeVista (){
        $this->getSmarty()->assign('home',BASE_URL.'home');
        $this->getSmarty()->display('templates/home.tpl');
    }

}
