<?php

class UserController extends Controller{

    public function __construct(){
        $this->connectDb();
    }

    public function defaultAction(){
        if( SessionUtils::checkUser() ){
            Utils::redirect( "dashboard", [ 'check_auth' => true ] );
        } else{
            $this->showLoginPage();
        }
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
            $user = $this->doLogin();
            if( $user ){
                SessionUtils::set( 'user', $user );
                Utils::redirect( "dashboard", [ 'check_auth' => true ] );
            } else{
                Utils::showError( "Usuario o contraseña incorrectos" );
                $this->showLoginPage();
            }
        } else{
            $this->showLoginPage();
        }
    }

    private function doLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::get( $this->db, $email, $password, true );
        return $user;
    }

    private function showLoginPage(){
        include_once( 'views/login.php' );
    }

    public function logout(){
        $this->doLogout();
        Utils::redirect();
    }

    private function doLogout(){
        SessionUtils::remove('user');
    }

    public function profile( $type = 'show' ){
        if( $type === 'edit' ){
            if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
                $this->doUpdateProfile();
            } else{
                $this->showProfilePage( $type );
            }
        } else{
            $this->showProfilePage( $type );
        }
    }

    private function showProfilePage( $type ){
        if( $type === 'edit' ){
            include_once( "views/profile/edit.php" );
        } else{
            include_once( "views/profile/show.php" );
        }
    }

    private function doUpdateProfile(){
        $name = $_POST['name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        if( $name && $lastName && $email ){
            $user = SessionUtils::get('user');
            if( $user ){
                $password = $_POST['password'];
                $passwordConfirm = $_POST['password_confirm'];
                if( $password || $passwordConfirm ){
                    if( $password !== $passwordConfirm ){
                        Utils::showError( 'Las contraseñas no coinciden.' );
                        $this->showProfilePage( 'edit' );
                        return;
                    } else{
                        $user->setPassword( $password );
                    }
                }
                $user->name = $name;
                $user->lastName = $lastName;
                $user->email = $email;
                if( $user->save( $this->db, true ) ){
                    SessionUtils::set( 'user', $user );
                    Utils::showSuccess( "Perfil actualizado." );
                    //Utils::redirect( "user/profile/show", [ 'check_auth' => true ] );
                    $this->showProfilePage( 'show' );
                } else{
                    Utils::showError( 'Ha ocurrido un error en el procesamiento de la petición.' );
                    $this->showProfilePage( 'show' );
                }
            } else{
                Utils::err403();
            }
        } else{
            Utils::showError( 'Faltan por rellenar campos obligatorios.' );
            $this->showProfilePage( 'edit' );
        }
    }

}