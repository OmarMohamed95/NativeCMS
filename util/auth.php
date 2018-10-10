<?php

class auth {

    // for app
    public static function checkLogin(){
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if($logged == FALSE){
            session_destroy();
            header('location:'. BASE_URL . 'login');
            exit();
        }
    }
    
    // for admin
    public static function checkLoginAdmin(){
        @session_start();
        $logged = $_SESSION['admin_logged'];
        if($logged == FALSE){
            session_destroy();
            header('location:'. ADMIN_URL .'login');
            exit();
        }
    }

}
