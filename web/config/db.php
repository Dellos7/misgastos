<?php

class Database{

    public static function getConnection(){
        $conn = new mysqli(
            $_ENV['MYSQL_HOST'],
            $_ENV['MYSQL_USER'],
            $_ENV['MYSQL_PASSWORD'],
            $_ENV['MYSQL_DATABASE'],
            $_ENV['MYSQL_PORT'],
        );
        if( $conn->connect_errno ){
            throw new DatabaseConnectionException( $conn->connect_error );
        } else{
            //$conn->query("SET NAMES 'utf8mb4'");
            $conn->set_charset( "utf8mb4" );
            return $conn;
        }
    }

}