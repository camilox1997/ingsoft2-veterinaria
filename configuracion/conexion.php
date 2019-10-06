<?php
    require_once 'variablesDeConexion.php';

    class Conexion {

        private $conexion;
        
        public function getConexion() {
            try {
                this->conexion = new PDO('mysql:'.servidor.';dbname='.base_datos.';chartset=utf8',usuario,clave);
                this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return this->conexion;
            } catch (PDOException $e) {
                die('Error -> '.$e->getMessage());
            }
        }

        public function closeConexion(){
            this->conexion = null;
        }
    }
?>