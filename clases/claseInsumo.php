<?php 
require_once("autoload.php");
class Insumo extends Konectar{
    private $intIdInsumo;
    private $strDescripcion;
    private $strUnmedida;
    private $fltCantidad;
    private $fltPrecio;
    private $intNcheque;
    private $intNpartida;
    private $intIdSolicitud;

    public function __construct(){
        // parent::Conexion();
        $this->conexion = new Konectar();
        $this->conexion = $this->conexion->connect();
    }

    public function agregInsumo(string $descrip, string $Umedida, float $cantidad,float $precio,int $cheque,int $Npartida,int $idSolicitud){
        $this->strDescripcion=$descrip;
        $this->strUnmedida=$Umedida;
        $this->fltCantidad=$cantidad;
        $this->fltPrecio=$precio;
        $this->intNcheque=$cheque;
        $this->intNpartida=$Npartida;
        $this->intIdSolicitud=$idSolicitud;
      
        $sql = "INSERT INTO tbl_insumo (id_insumo,descripcion,unMedida,cantidad,precio,Ncheque,npartida,id_solicitud)
        VALUES (null,?,?,?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $datos = array($this->strDescripcion, $this->strUnmedida,$this->fltCantidad,$this->fltPrecio,$this->intNcheque,$this->intNpartida,$this->intIdSolicitud);
        $inser = $insert->execute($datos);
        return $inser;    
    }


    public function verTinsumo(){
        $sql = "SELECT* FROM tbl_insumo";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function modificarInsumo(int $num,string $descrip, string $Umedida, float $cantidad,float $precio,int $cheque,int $Npartida,int $idSolicitud)    {
        $this->strDescripcion=$descrip;
        $this->strUnmedida=$Umedida;
        $this->fltCantidad=$cantidad;
        $this->fltPrecio=$precio;
        $this->intNcheque=$cheque;
        $this->intNpartida=$Npartida;
        $this->intIdSolicitud=$idSolicitud;

        $sql = "UPDATE tbl_insumo SET descripcion=?,unMedida=?,cantidad=?,precio=?,Ncheque=?,npartida=?,id_solicitud=? WHERE id_insumo=$num";
        $update = $this->conexion->prepare($sql);
        $arraydata = array($this->strDescripcion, $this->strUnmedida,$this->fltCantidad,$this->fltPrecio,$this->intNcheque,$this->intNpartida,$this->intIdSolicitud);
        $resExecute = $update->execute($arraydata);
        return $resExecute;
    }

    public function unInsumo(int $id)    {
        $sql = "SELECT * FROM tbl_insumo WHERE id_insumo=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetch(PDO::FETCH_ASSOC);
        return $request;
    }

    public function porIdentf($num){
        $sql = "SELECT* FROM tbl_insumo where id_solicitud=$num";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function agregalg(string $descrip, string $Umedida, float $cantidad,int $idSolicitud){
        $this->strDescripcion=$descrip;
        $this->strUnmedida=$Umedida;
        $this->fltCantidad=$cantidad;
        $this->intIdSolicitud=$idSolicitud;
      
        $sql = "INSERT INTO tbl_insumo (id_insumo,descripcion,unMedida,cantidad,precio,Ncheque,npartida,id_solicitud)
        VALUES (null,?,?,?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $datos = array($this->strDescripcion, $this->strUnmedida,$this->fltCantidad,$this->intIdSolicitud);
        $inser = $insert->execute($datos);
        return $inser;    
    }
     public function bucarID($num){
        $sql="SELECT S.id_solicitud,U.nombre, U.id_carrera
        FROM tbl_solicitud as S, tbl_usuario as U, tbl_estado as E
        where S.id_estado=E.id_estado and S.id_usuario=U.id_usuario and S.id_solicitud=$num";
         $execute = $this->conexion->query($sql);
         $request = $execute->fetch(PDO::FETCH_ASSOC);
         return $request;
     }
     public function eliminarInsumo(int $id)
    {
        $sql = "DELETE FROM tbl_insumo WHERE id_insumo=? ";
        $arrayWhere = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($arrayWhere);
        return $del;
    }
    public function cheque($num){
        $sql = "SELECT Ncheque,descripcion,precio FROM tbl_insumo where Ncheque=$num";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    
}
// $n=new Insumo();
// // // $insertar = $n->modificarInsumo($id_insumo, $descrip, $medida, $cant, $price, $cheq, $Npart, $idsolicitud);
// $insertar = $n->modificarInsumo(7, "cable de red categoria 6 sin refuerzo", "metros", 40, 40, 507, 21400, 4);
// if ($insertar) {
//     echo "la operacion se realizo exitosamente";
// }else{
//     echo "no se hizo nada";
// }


?>