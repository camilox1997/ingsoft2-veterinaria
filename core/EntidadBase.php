<?php
class EntidadBase{
    private $table, $db, $conectar;

    public function __construct($table){
        $this->table = $table;

        require_once 'Conexion.php';
        $this->conectar = new Conectar();
        $this->db=$this->conectar->conexion();
    }

    public function getConectar(){
        return $this->conectar;
    }

    public function db(){
        return $this->db;
    }

    public function getAll(){
        $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        $resultSet = array();
        while($row = $query->fetch(PDO::FETCH_OBJ)){
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function getAllUsers(){
        $query = $this->db->query("SELECT * FROM $this->table ORDER BY identificacion ASC"); 
        $resultSet = array();
        while($row = $query->fetch(PDO::FETCH_OBJ)){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    
    public function getUsersPagination($page){
        $cont = 0;
        if($page!=0){
            $cont = ($page-1)*3;
        }
        $query = $this->db->query("SELECT * FROM $this->table ORDER BY identificacion ASC LIMIT $cont,3"); 
        $resultSet = array();
        while($row = $query->fetch(PDO::FETCH_OBJ)){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function getById($id){
        $query = $this->db->query("SELECT * FROM $this->table WHERE id=$id");
        if($row=$query->fetch(PDO::FETCH_OBJ)){
            $resultSet=$row;
        }

        return $resultSet;
    }

    public function getByIdentified($identification){
        $query = $this->db->query("SELECT * FROM $this->table WHERE identificacion=$identification");
        if($row=$query->fetch(PDO::FETCH_OBJ)){
            $resultSet=$row;
        }

        return $resultSet;
    }

    public function getBy($column, $value) {
        $query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
        $resultSet = array();
        while($row = $query->fetch(PDO::FETCH_OBJ)){
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

    public function deleteByIdentified($identification){
        $query=$this->db->query("DELETE FROM $this->table WHERE identificacion=$identification");
        return $query;
    }

    public function deleteBy($column, $value){
        $query=$this->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }

}
?>