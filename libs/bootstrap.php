<?php

class bootstrap {

    private $_url = NULL;
    private $_controller = NULL;
    private $_controllerPath = 'app/controller/';
    private $_modelPath = 'app/model/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index';
    
    public function init() {
        $this->_getUrl();

        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return FALSE;
        }

        $this->_loadController();

        $this->_loadControllerMethod();
    }
    
    public function setControllerPath($path){
        $this->_controllerPath = trim($path, '/') . '/';
    }
    
    public function setModelPath($path){
        $this->_modelPath = trim($path, '/') . '/';
    }
    
    public function setErrorFile($path){
        $this->_errorFile = trim($path, '/');
    }
    
    public function setDefaultFile($path){
        $this->_defaultFile = trim($path, '/');
    }

    private function _getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = trim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    private function _loadDefaultController() {
        require BASE_DIR . $this->_controllerPath . $this->_defaultFile . '.php';
        $this->_controller = new $this->_defaultFile();
        $this->_controller->loadModel($this->_defaultFile, $this->_modelPath);
        $this->_controller->index();
    }

    private function _loadController() {
        $file = BASE_DIR . $this->_controllerPath . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0]();
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            return FALSE;
        }
    }

    private function _loadControllerMethod() {
        $length = count($this->_url);
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
                return FALSE;
            }
        }

        switch ($length) {
            case 5:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }

    private function _error() {
        require BASE_DIR . $this->_controllerPath . $this->_errorFile;
        $this->_controller = new error();
        $this->_controller->index();
        exit();
    }

}
