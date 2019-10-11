<?php

require_once './configuracion/conexion.php'; // posible mente este mal includa la conexion

class Cliente{
    private $consulta = '';
    private $conexion;

    
    public function registrarCliente($identificacion, $nombre, $apellido, $direccion, $telefono, $username, $pass, $tipo) {
        try {
            
            $this->consulta = "INSERT INTO Persona(identificacion, nombre, apellido, direccion, telefono, username, pass, tipo) VALUES (:identificacion, :nombre, :apellido, :direccion, :telefono, :username, :pass, :tipo)";
            
            if($this->getCliente($identificacion) != null) {
                $this->conexion = Conexion::getConexion();
                $consultaPreparada = $this->conexion->prepare($this->consulta);
                $consultaPreparada->bindParam(':identificacion',$identificacion,PDO::PARAM_LOB);
                $consultaPreparada->bindParam(':nombre',$nombre,PDO::PARAM_STR);
                $consultaPreparada->bindParam(':apellido',$apellido,PDO::PARAM_STR);
                $consultaPreparada->bindParam(':direccion',$direccion,PDO::PARAM_STR);
                $consultaPreparada->bindParam(':telefono',$telefono,PDO::PARAM_LOB);
                $consultaPreparada->bindParam(':username',$username,PDO::PARAM_STR);
                $consultaPreparada->bindParam(':pass',$pass,PDO::PARAM_STR);
                $consultaPreparada->bindParam(':tipo',$tipo,PDO::PARAM_STR);
                
                if($consultaPreparada->execute()){
                    $respuesta = 'Registro Exitoso';
                }
                $this->conexion = Conexion::closeConexion();
            } else {
                $respuesta = 'Este registro ya existe';
            }
            return $respuesta;
        } catch(PDOException $e) {
            die('Error al registrar -> '.$e->getMessage());
        }
    }

    public function getClientes(){
        $this->consulta = "SELECT * FROM Persona WHERE tipo = 'cliente'";
        $this->conexion = Conexion::getConexion();
        $consultaPreparada = $this->conexion->prepare($this->consulta);
        $consultaPreparada->execute();
        $filasAfectadasPorConsulta = $consultaPreparada->rowCount();
        if($filasAfectadasPorConsulta > 0) $respuesta = $consultaPreparada->fetchAll();
        else $respuesta = null;
        return $respuesta;
        $this->conexion = Conexion::closeConexion();
    }

    public function getCliente($identificacion){
        $this->consulta = "SELECT * FROM Persona WHERE tipo = 'cliente' AND identificacion = :identificacion";
        $this->conexion = Conexion::getConexion();
        $consultaPreparada = $this->conexion->prepare($this->consulta);
        $consultaPreparada->bindParam(':identificacion', $identificacion, PDO::PARAM_LOB);
        $consultaPreparada->execute();
        $rows = $consultaPreparada->rowCount();
        if($rows > 0) $respuesta = $consultaPreparada->fetchAll();
        else $respuesta = null;
        return $respuesta;
        $this->conexion = Conexion::closeConexion();
    }

    public function editarCliente($identificacion, $nombre, $apellido,$direccion, $telefono, $username, $pass){
        try{
            $this->consulta = "UPDATE Persona SET identificacion = :identificacion, nombre = :nombre, apellido = :apellido, direccion = :direccion, telefono = :telefono, username = :username, pass = :pass";
            $this->conexion = Conexion::getConexion();
            $consultaPreparada = $this->conexion->prepare($this->consulta);
            $consultaPreparada->bindParam(':identificacion', $identificacion, PDO::PARAM_LOB);
            $consultaPreparada->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':telefono', $telefono, PDO::PARAM_LOB);
            $consultaPreparada->bindParam(':username', $username, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':pass', $pass, PDO::PARAM_STR);
            if($consultaPreparada->execute()) $respuesta = true;
            else $respuesta = false;
            return $respuesta;
            $this->conexion = Conexion::closeConexion();
        } catch (PDOException $e){
            die('Error actualizar -> '.$e->getMessage());
        }
    }

    public function eliminarCliente($identificacion){
        try{
            $this->consulta  = "DELETE FROM Persona WHERE identificacion = :identificacion AND tipo = 'cliente'";
            $this->conexion =  Conexion::getConexion();
            $consultaPreparada = $this->conexion->prepare($this->consulta);
            $consultaPreparada->bindParam(':identificacion', $identificacion, PDO::PARAM_LOB);
            if($consultaPreparada->execute()) $respuesta = true;
            else $respuesta = false;
            return $respuesta;
            $this->conexion = Conexion::closeConexion();
        } catch(PDOException $e) {
            die('Error eliminar -> '.$e->getMessage());
        }
    }

}//llave de salida de la clase admin

?>