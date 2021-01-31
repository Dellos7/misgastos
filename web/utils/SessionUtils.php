<?php

class SessionUtils{

    public static function remove( $key ){
        if( isset( $_SESSION[$key] ) ){
            $_SESSION[$key] = null;
            unset( $_SESSION[$key] );
        }
    }

    public static function set( $key, $value ){
        $_SESSION[$key] = $value;
    }

    public static function get( $key ){
        if( isset($_SESSION[$key]) ){
            return $_SESSION[$key];
        }
        return null;
    }

    public static function checkUser(){
        return !!self::get( 'user' );
    }

}