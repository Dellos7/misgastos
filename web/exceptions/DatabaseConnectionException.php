<?php

class DatabaseConnectionException extends Exception{

    public function __construct( $msg = 'Ha habido un error en la conexión a la base de datos.' )
    {
        parent::__construct( $msg );
    }

}

