<?php

class GastosController extends Controller{

    public function __construct()
    {
        $this->connectDb();
    }

    public function defaultAction(){
        $this->showUltimosGastosPage();
    }

    public function showUltimosGastosPage(){
        if( SessionUtils::checkUser() ){
            $gastos = GastoConcreto::getAll( $this->db, SessionUtils::get('user') );
            include_once( "views/gastos/ultimos.php" );
        } else{
            Utils::redirect( 'user/login' );
        }
    }

    public function add(){
        if( SessionUtils::checkUser() ){
            if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
                //TODO: añadir un gasto
            } else{
                include_once( "views/gastos/add.php" );
            }
        } else{
            Utils::redirect( 'user/login' );
        }
        
    }

}