<?php

class controller {

    function __construct() {
        $this->view = new view();
        $this->themeController = new themeController();
        $this->view->pS = $this->themeController->parentSections;
        $this->view->cS = $this->themeController->childSections;
        $this->view->s = $this->themeController->Sections;
        $this->view->sittings = $this->themeController->sittings;
    }
    
    function loadModel($name, $modelPath = 'model/'){
        $path = BASE_DIR . $modelPath . $name.'_model.php';
        
        if(file_exists($path)){
            require $path;
            
            $modelName = $name.'_model';
            $this->model = new $modelName();
        }
    }
}
