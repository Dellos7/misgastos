<?php

class Utils{

    public static function redirect( $path = '', $opts = [ 'relative' => false, 'check_auth' => false ] ){
        $url = $opts['relative'] ? $path : BASE_URL . $path;
        if( $opts['check_auth'] ){
            if( !SessionUtils::checkUser() ){
                self::err403();
            }
        }
        header( "Location: {$url}" );
    }

    public static function err403(){
        header( "Location: " . BASE_URL . "error/403.php" );
    }

    public static function err404(){
        header( "Location:" . BASE_URL . "error/404.php" );
    }

    public static function showError( $error ){
        SessionUtils::set( 'error', $error );
        include_once( 'views/errorAlert.php' );
    }

    public static function showSuccess( $msg ){
        SessionUtils::set( 'success', $msg );
        include_once( 'views/successAlert.php' );
    }

}