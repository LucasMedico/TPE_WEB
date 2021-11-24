<?php

include_once ('views/ViewTemplates.php');

class InicioController {

    private $view;
    
    function __construct() {
        $this->view = new Viewtemplates();
    }

    function showHome() {
        $this->view->showHomeVista();
    }
}