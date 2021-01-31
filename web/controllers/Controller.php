<?php

abstract class Controller{

    protected $db;

    public function connectDb(){
        try{
            $this->db = Database::getConnection();
        } catch( DatabaseConnectionException $e ){
            //echo $e->getMessage() . "<br>";
            $this->showError( $e->getMessage() );
        }
    }

    public abstract function defaultAction();

}