<?php
class UsuarioModel extends ModeloBase {
    private $table;

    public function __construct(){
        $this->table = "Usuario";
        parent::__construct($this->table);
    }

    public function getUnUsuario(){
        $query="SELECT * FROM Usuario WHERE identifiacion = 1067036802";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
}
?>