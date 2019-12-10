<?php
class Raza extends EntidadBase{
    private $id, $nombre, $tipoMascota;
    private $table;

    public function __construct(){
        $this->table="Razas";
        parent::__construct($this->table);
    }

    public function getId(){
        return $this->identificacion;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getTipoMascota(){
        return $this->tipoMascota;
    }

    public function setTipoMascota($tipoMascota){
        $this->tipoMascota = $tipoMascota;
    }

    
    public function save(){
        $query="INSERT INTO $this->table(nombre, tipo_mascota)"
                            . "VALUES ('"
                            . $this->nombre."','"
                            . $this->tipoMascota."'"
                            . ");";
        $save=$this->db()->query($query);
        return $save;
    }

    public function update(){
        $query="UPDATE $this->table SET nombre='$this->nombre',
                                   tipo_mascota='$this->tipoMascota'
                                   WHERE id=$this->id;";
        $update=$this->db()->query($query);
        return $update;
    }
}
?>