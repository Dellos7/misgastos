<?php

class DashboardController extends Controller{

    public function __construct()
    {
        
    }

    public function defaultAction()
    {
        $this->showDashboardPage();
    }

    private function showDashboardPage(){
        if( SessionUtils::checkUser() ){
            include_once( "views/dashboard.php" );
        } else{
            Utils::err403();
        }
    }

}