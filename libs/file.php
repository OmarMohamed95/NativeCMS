<?php

class file {

    private $_file;
    private $_max_size;
    private $_file_name;
    private $_file_ext;
    private $_tmp_name;
    private $_dir;
    private $_allowed_ext = array();

    public function __construct($files, $max_size, $dir) {
        if (is_int($max_size) and is_dir($dir)) {
            $this->_file = $files;
            $this->_max_size = $max_size;
            $this->_dir = $dir;
        }
    }

    public function uploadMultible() {
        $this->_allowed_ext = array('jpg', 'png', 'jpeg');

        for ($i = 0; $i < count($this->_file['name']); $i++) {
            $this->_file_ext = strtolower(array_pop(explode('.', $this->_file['name'])));
            $this->_tmp_name = $this->_file['tmp_name'];
            $this->_file_name = date('Y-m-d_h_i_s') . $this->_file['name'];
            $destination = $this->_dir . $this->_file_name;

            if (in_array($this->_file_ext, $this->_allowed_ext) and $this->_file['size'] < $this->_max_size) {
                move_uploaded_file($this->_tmp_name, $destination);
            }
        }
    }

    public function uploadSingle() {
        $this->_allowed_ext = array('jpg', 'png', 'jpeg');

        $this->_file_ext = strtolower(array_pop(explode('.', $this->_file['name'])));
        $this->_tmp_name = $this->_file['tmp_name'];
        $this->_file_name = date('Y-m-d_h_i_s') . $this->_file['name'];
        $destination = $this->_dir . $this->_file_name;

        if (in_array($this->_file_ext, $this->_allowed_ext) and $this->_file['size'] < $this->_max_size) {
            move_uploaded_file($this->_tmp_name, $destination);
        }
    }
    
    /*
     *return file name 
     *ex: 2018-09-14_03_45_551231_n.jpg
     */
    public function getFileName() {
        return $this->_file_name;
    }
    
    /*
     *remove file from dir 
     *@param full name of the file ex: C:\xampp\htdocs\project1/public/images/2018-09-14_03_45_551231_n.jpg
     */
    public function removeFile($filename) {
        unlink(BASE_DIR . $filename);
    }
    
    /*
     *remove file from dir 
     *@param full name of the file ex: C:\xampp\htdocs\project1/public/images/2018-09-14_03_45_551231_n.jpg
     */
    public function loadFile($filename) {
        return glob($filename,GLOB_BRACE);
    }
}
