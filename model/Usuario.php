<?php
class Usuario extends EntidadBase{
    private $identificacion, $nombre, $apellido, $direccion, $telefono, $username, $pass, $tipo;
    private $table;

    public function __construct(){
        $this->table="Usuario";
        parent::__construct($this->table);
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }

    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getUserName(){
        return $this->username;
    }

    public function setUserName($username){
        $this->username = $username;
    }

    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        $this->pass = $pass;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function save(){
        $query="INSERT INTO Usuario(identificacion, nombre, apellido, direccion, telefono, username, pass, tipo)"
                            . "VALUES ('"
                            . $this->identificacion."','"
                            . $this->nombre."','"
                            . $this->apellido."','"
                            . $this->direccion."','"
                            . $this->telefono."','"
                            . $this->username."','"
                            . $this->pass."','"
                            . $this->tipo."'"
                            . ");";
        $save=$this->db()->query($query);
        return $save;
    }
}
?>