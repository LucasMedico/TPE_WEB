<?php

require_once('libs/smarty/Smarty.class.php');
require_once('View.php');

class ViewTemplates extends View {

    function ShowHomeVista (){
        $this->getSmarty()->assign('inicio',BASE_URL.'inicio');
        $this->getSmarty()->display('templates/inicio.tpl');
    }
}
