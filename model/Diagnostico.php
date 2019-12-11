<?php
class Diagnostico extends EntidadBase{
    private $id, $nombre_diagnostico;
    private $table;

    public function __construct(){
        $this->table="Diagnostico";
        parent::__construct($this->table);
    }

    public function getIdDiagnostico(){
        return $this->id;
    }

    public function setIdDiagnostico($id){
        $this->id = $id;
    }

    public function getNombreDiagnostico(){
        return $this->nombre_diagnostico;
    }

    public function setNombreDiagnostico($nombre_diagnostico){
        $this->nombre_diagnostico = $nombre_diagnostico;
    }

    
    public function save(){
        $query="INSERT INTO $this->table(nombre_diagnostico)"
                            . "VALUES ('"
                            . $this->nombre_diagnostico."'"
                            . ");";
        $save=$this->db()->query($query);
        return $save;
    }

    public function update(){
        $query="UPDATE $this->table SET nombre_diagnostico='$this->nombre_diagnostico'
                                   WHERE id=$this->id;";
        $update=$this->db()->query($query);
        return $update;
    }
}
?>