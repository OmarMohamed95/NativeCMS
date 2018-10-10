<?php

class error extends controller{

    function __construct() {
        parent::__construct();
        $this->themeController = new themeController();
        $this->view->pS = $this->themeController->parentSections;
        $this->view->cS = $this->themeController->childSections;
        $this->view->s = $this->themeController->Sections;
        $this->view->sittings = $this->themeController->sittings;
        $this->view->msg = 'this page doesnt exist';
    }
    
    function index(){
        $this->view->title = 'error';
        $this->view->render('error/index');
    }
}
