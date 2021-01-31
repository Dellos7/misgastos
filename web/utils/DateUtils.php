<?php

class DateUtils{

    public static function dateFormat( $bbddDate ){
        $dt = new DateTime( $bbddDate );
        return $dt->format( 'd/m/Y' );
    }

}