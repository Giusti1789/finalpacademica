<?php
require_once("autoload.php");
class Cargo extends Konectar{
    private $intId;
    private $strCargo;
    public function __construct(){
        // parent::Conexion();
        $this->conexion = new Konectar();
        $this->conexion = $this->conexion->connect();
    }

    public function unCargo(int $id){
        $sql = "SELECT * FROM tbl_cargo WHERE id_cargo=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetch(PDO::FETCH_ASSOC);
        return $request;
    }
    public function verCargos(){
        $sql = "SELECT* FROM tbl_cargo";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    

}
?>