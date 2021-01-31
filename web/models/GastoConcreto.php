<?php

class GastoConcreto{

    public $id;
    public $nombre;
    public $descripcion;
    public $coste;
    public $fecha;
    public $gasto;
    public $user;

    public function __construct( $id, $nombre, $descripcion, $coste, $fecha, $gasto, User $user )
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->coste = $coste;
        $this->fecha = $fecha;
        $this->gasto = $gasto;
        $this->user = $user;
    }

    public static function getAll( $db , User $user ){
        if( $db ){
            $sql = <<<EOT
SELECT *
FROM gasto_concreto
WHERE user_id = ?
ORDER BY fecha DESC
EOT;
            $stmt = $db->prepare( $sql );
            if( $stmt ){
                $stmt->bind_param( "s", $user->id );
                $stmt->execute();
                $res = $stmt->get_result();
                $gastos = [];
                foreach( $res->fetch_all(MYSQLI_ASSOC) as $row ){
                    //TODO: el gasto generico (de momento a null)
                    $gasto = new GastoConcreto(
                        $row['id'],
                        $row['nombre'],
                        $row['descripcion'],
                        $row['coste'],
                        $row['fecha'],
                        null,
                        $user
                    );
                    $gastos[] = $gasto;
                }
                return $gastos;
            }

        }
        return null;
    }

}