<?php
    class Conectar {

        private $driver, $host, $user, $pass, $database, $charset;

        public function __construct() {
            $db_cfg = require_once 'config/database.php';
            $this->driver = $db_cfg["driver"];
            $this->host = $db_cfg["host"];
            $this->user = $db_cfg["user"];
            $this->pass = $db_cfg["pass"];
            $this->database = $db_cfg["database"];
            //$this->charset = $db_cfg["charset"];
        }

        public function conexion() {
            if($this->driver=="mysql" || $this->driver==null){
                try{
                    $conexion = new PDO("$this->driver:host=$this->host;dbname=$this->database",$this->user,$this->pass);
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $conexion;
                } catch(PDOException $e){
                    echo $e->getMessage();
                    die();
                }
            }
        }
    }
?>