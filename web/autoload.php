<?php

function autoloadControllers( $class ){
    include "controllers/" . $class . ".php";
}

function autoloadExceptions( $class ){
    include "exceptions/" . $class . ".php";
}

function autloadModels( $class ){
    include "models/" . $class . ".php";
}

function autoloadUtils( $class ){
    include "utils/" . $class . ".php";
}

spl_autoload_register( "autoloadControllers" );
spl_autoload_register( "autoloadExceptions" );
spl_autoload_register( "autloadModels" );
spl_autoload_register( "autoloadUtils" );