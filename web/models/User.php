<?php

class User{

    public $id;
    public $name;
    public $lastName;
    public $email;
    public $role;
    private $password;

    public function __construct( $id, $name, $lastName, $email, $role, $password ){
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }

    public static function get( $db, $email, $password, $verify = false ){
        if( $db ){
            $stmt = $db->prepare( 'SELECT * FROM users WHERE email = ?' );
            if( $stmt ){
                $stmt->bind_param( 's', $email );
                $stmt->execute();
                $res = $stmt->get_result();
                $row = $res->fetch_assoc();
                // $row['name'], $row['last_name']
                if( $verify ){
                    $verified = password_verify( $password, $row['password'] );
                    if( !$verified ){
                        return null;
                    }
                }
                $user = new User( $row['id'], $row['name'], $row['last_name'], $row['email'], $row['role'], $row['password'] );
                return $user;
            }
        }
        return null;
    }

    public function save( $db = null, $avoidCreate = false ){
        if( $db ){
            $stmt = $db->prepare('UPDATE users SET name = ?, last_name = ?, email = ?, role = ?, password = ? WHERE id = ?');
            $stmt->bind_param( "ssssss", $this->name, $this->lastName, $this->email, $this->role, $this->password, $this->id );
            $stmt->execute();
            if( $stmt->affected_rows <= 0 ){ // No se ha ejecutado el update
                if( !$avoidCreate ){ // Permitimos registrar un nuevo usuario
                    // Crear un id único
                    $this->id = uniqid();
                    $stmt = $db->prepare( 'INSERT INTO users (id, name, last_name, email, role, password) VALUES (?, ?, ?, ?, ?, ?)' );
                    $stmt->bind_param( "ssssss", $this->id, $this->name, $this->lastName, $this->email, $this->role, $this->password );
                    $stmt->execute();
                    if( $stmt->affected_rows > 0 ){
                        return $this->id;
                    }
                }
            } else{
                return $this->id;
            }
            
        }
        return null;
    }

    public function setPassword( $newPassword ){
        $this->password = password_hash( $newPassword, PASSWORD_DEFAULT );
    }

}