<?php
class Producto extends EntidadBase{
    private $id, $nombre_producto, $tipo_producto, $precio_producto;
    private $table;

    public function __construct(){
        $this->table="Producto";
        parent::__construct($this->table);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombreProducto(){
        return $this->nombre_producto;
    }

    public function setNombreProducto($nombre_producto){
        $this->nombre_producto = $nombre_producto;
    }

    public function getTipoProducto(){
        return $this->tipo_producto;
    }

    public function setTipoProducto($tipo_producto){
        $this->tipo_producto = $tipo_producto;
    }

    public function getPrecioProducto(){
        return $this->precio_producto;
    }

    public function setPrecioProducto($precio_producto){
        $this->precio_producto = $precio_producto;
    }

    public function save(){
        $query="INSERT INTO $this->table(nombre_producto, tipo_producto, precio_producto)"
                            . "VALUES ('"
                            . $this->nombre_producto."','"
                            . $this->tipo_producto."','"
                            . $this->precio_producto."'"
                            . ");";
        $save=$this->db()->query($query);
        return $save;
    }

    public function update(){
        $query="UPDATE $this->table SET nombre_producto='$this->nombre_producto',
                                   tipo_producto='$this->tipo_producto',
                                   precio_producto=$this->precio_producto WHERE id=$this->id";
        $update=$this->db()->query($query);
        return $update;
    }
}
?>