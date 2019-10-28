<?php
class ModeloBase extends EntidadBase{
    private $table;

    public function __construct($table){
        $this->table = (string) $table;
        parent::__construct($table);
    }

    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        
        if($query){
            if($query->rowCount>1){
                while($row = $query->fetch(PDO::FETCH_OBJ)){
                    $resulSet[] = $row;
                }
            } elseif($query->rowCount == 1){
                if($row = $query->fetch(PDO::FETCH_OBJ)){
                    $resulSet = $row;
                }
            } else {
                $resulSet = true;
            }
        } else {
            $resulSet = false;
        }
        return $resulSet;
    }
}
?>