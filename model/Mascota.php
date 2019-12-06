<?php
class Mascota extends ControladorBase{
    private $id, $nombre, $id_raza, $sexo, $peso, $edad, $fecha_nacimiento, $responsable;
    private $table;

    public function __construct(){
        $this->table="Mascota";
        parent::__construct($this->table);
    }

    public function getId(){
        return $this->id;
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

    public function getId_raza(){
        return $this->id_raza;
    }

    public function setId_raza($id_raza){
        $this->id_raza = $id_raza;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function getFecha_nacimiento(){
        return $this->fecha_nacimiento;
    }

    public function setFecha_nacimiento($fecha_nacimiento){
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getResponsable(){
        return $this->responsable;
    }

    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }

    public function save(){
        $query="INSERT INTO Mascota(nombre, id_raza, sexo, peso, edad, fecha_nacimiento, responsable)"
                            . "VALUES ('"
                            . $this->nombre."','"
                            . $this->id_raza."','"
                            . $this->sexo."','"
                            . $this->peso."','"
                            . $this->edad."','"
                            . $this->fecha_nacimiento."','"
                            . $this->responsable."','"
                            . ");";
        $save=$this->db()->query($query);
        return $save;
    }

    public function update(){
        $query="UPDATE Mascota SET nombre=$this->nombre,
                                   id_raza=$this->id_raza,
                                   sexo=$this->sexo,
                                   peso=$this->peso,
                                   edad=$this->edad,
                                   fecha_nacimiento=$this->fecha_nacimiento,
                                   responsable=$this->responsable WHERE id=$this->id";
        $update=$this->db()->query($query);
        return $update;
    }
}
?>