<?php 
require_once("autoload.php");
class Solicitud extends Konectar{
    
    private $strDescripcion;
    private $intId_usuario;
    private $intId_estado;
    private $Fecha_Registro;

    public function __construct(){
        $this->conexion = new Konectar();
        $this->conexion = $this->conexion->connect();
    }
    public function agregarSolicitud(string $descripcion, int $id_usuario,int $id_estado, $fecha){
        $this->strDescripcion = $descripcion;
        $this->intId_usuario = $id_usuario;
        $this->intId_estado=$id_estado;
        $this->Fecha_Registro=$fecha;

        $sql = "INSERT INTO tbl_solicitud(descripcion,id_usuario,id_estado,fecha_Registro)VALUES (?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $datos = array($this->strDescripcion, $this->intId_usuario,$this->intId_estado,$this->Fecha_Registro);
        $inser = $insert->execute($datos);
        $idInsert = $this->conexion->lastInsertId();
        return $idInsert;
    }
    public function verSolicitud(){
        $sql = "SELECT* FROM tbl_solicitud where id_estado=1";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function porIdentf($num){
        $sql = "SELECT* FROM tbl_solicitud where id_solicitud=$num";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function mostrarAdmi(){
        $sql="SELECT S.id_solicitud,S.descripcion,U.nombre,E.estado, S.fecha_Registro,U.id_carrera
        FROM tbl_solicitud as S, tbl_usuario as U, tbl_estado as E
        where S.id_estado=E.id_estado and S.id_usuario=U.id_usuario";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function modificEstado(int $idSoli, string $descripcion, int $id_usuario,int $id_estado, $fecha)
    {
        $this->strDescripcion = $descripcion;
        $this->intId_usuario = $id_usuario;
        $this->intId_estado=$id_estado;
        $this->Fecha_Registro=$fecha;

        $sql = "UPDATE tbl_solicitud SET descripcion=?,id_usuario=?,id_estado=?,fecha_Registro=?
        WHERE id_solicitud=$idSoli";
        $update = $this->conexion->prepare($sql);
        $arraydata = array(
            $this->strDescripcion, $this->intId_usuario,$this->intId_estado,$this->Fecha_Registro,);
        $resExecute = $update->execute($arraydata);
        return $resExecute;
    }
    public function cambioEstado(int $idSoli,int $id_estado)
    {
        $this->intId_estado=$id_estado;     
        $sql="UPDATE tbl_solicitud SET id_estado = ? WHERE id_solicitud=$idSoli ";
        $update = $this->conexion->prepare($sql);
        $arraydata = array(
        $this->intId_estado,);
        $resExecute = $update->execute($arraydata);
        return $resExecute;
    }
    public function mostrarXcarr($id){
        $sql="SELECT S.id_solicitud,S.descripcion,U.nombre,E.estado, S.fecha_Registro,U.id_carrera
        FROM tbl_solicitud as S, tbl_usuario as U, tbl_estado as E
        where S.id_estado=E.id_estado and S.id_usuario=U.id_usuario and U.id_carrera=$id";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
}
// $soli=new Solicitud();
// $ob=$soli->modificEstado(13,"insumos para sistemas",1,3,2022-11-14);
// $ob=$soli->cambioEstado(13,3);
// print_r("<pre>");
// print_r($ob);
?>

