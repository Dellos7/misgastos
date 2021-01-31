<?php

error_reporting( E_ERROR ); // Mostrar en pantalla solo los errores (ni warnings ni nada)
ob_start(); // Almacenar la salida en un buffer y liberarla en el ob_end_flush()

require_once "autoload.php";
session_start(); // Después del autoload siempre para que no haya problemas al guardar objetos en la sesión
// Coloca como Cookie la sesión actual para que, aunque se cierre el navegador, se guarde la sesión
// durante $cookieSecs segundos
$cookieSecs = 5 * 60;
setcookie( session_name(), session_id(), time() + $cookieSecs );

//echo "session name: " . session_name() . ", id: " . session_id() . "<br>";

require_once 'config/db.php';
require_once "config/global.php";

include "layouts/header.php";

function getControllerClassName( $controllerName ){
    return ucfirst( $controllerName ) . 'Controller';
}

$request = $_GET['request'];
$requestArr = explode( "/", $request );
if( $requestArr[0] ){
    $controllerName = $requestArr[0];
}

if( $controllerName ){
    // Quitar el "/" final para que no haya problemas
    if( substr( $controllerName, strlen($controllerName)-1, 1 ) === '/' ){
        $controllerName = str_replace( "/", "", $controllerName );
    }
    $controllerClassName = getControllerClassName( $controllerName );
} else{
    $controllerClassName = getControllerClassName( DEFAULT_CONTROLLER );
}

if( class_exists( $controllerClassName ) ){
    $controlador = new $controllerClassName;
    if( $requestArr[1] ){
        $action = $requestArr[1];
    }
    if( $action && method_exists( $controlador, $action ) ){
        if( $requestArr[2] ){
            $controlador->$action( $requestArr[2] );
        } else{
            $controlador->$action();
        }
    } else{
        $controlador->defaultAction();
    }
} else{
    // throw error
    echo "class {$controllerClassName} does not exist <br>";
}

include "layouts/footer.php";
ob_end_flush();