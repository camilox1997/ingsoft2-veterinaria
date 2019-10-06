<?php
    class InicioControlador{

        public function Inicio(){
            $conexiondb = Conexion::getConexion();
            require_once 'vista/inicio/principal.php';
        }
    }
?>