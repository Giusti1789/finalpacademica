<?php 
require_once("autoload.php");
class PartidaEco extends konectar{
    private $intNpartida;
    private $strDescripcion;
    private $fltMonto;
    private $strDetalle;

    public function __construct(){
        // parent::Conexion();
        $this->conexion = new Konectar();
        $this->conexion = $this->conexion->connect();
    }

    public function agrgarPartida(int $num, string $desc,float $cantidad, string $detalle){
        $this->intNpartida = $num;
        $this->strDescripcion = $desc;
        $this->fltMonto = $cantidad;
        $this->strDetalle = $detalle;
        $sql = "INSERT INTO tbl_peconomica(npartida,descripcion,monto,detalle)VALUES (?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $datos = array($this->intNpartida, $this->strDescripcion,$this->fltMonto,$this->strDetalle);
        $inser = $insert->execute($datos);
        return $inser;    
    }
    public function verPartida(){
        $sql = "SELECT* FROM tbl_peconomica";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function modificarPartida(int $num, string $desc,float $cantidad, string $detalle)    {
        $this->intNpartida = $num;
        $this->strDescripcion = $desc;
        $this->fltMonto = $cantidad;
        $this->strDetalle = $detalle;

        $sql = "UPDATE tbl_peconomica SET npartida=?,descripcion=?,monto=?,detalle=? WHERE npartida=$num";
        $update = $this->conexion->prepare($sql);
        $arraydata = array($this->intNpartida, $this->strDescripcion,$this->fltMonto,$this->strDetalle);
        $resExecute = $update->execute($arraydata);
        return $resExecute;
    }

    public function unaPartida(int $id)    {
        $sql = "SELECT * FROM tbl_peconomica WHERE npartida=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetch(PDO::FETCH_ASSOC);
        return $request;
    }
    
    public function eliminarPartida(int $id)    {
        $sql = "DELETE FROM tbl_peconomica WHERE npartida=?";
        $arrayWhere = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($arrayWhere);
        return $del;
    }
    public function sumar(int $id,float $num)
    {
        $sql = "SELECT * FROM tbl_peconomica WHERE npartida=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetchall(PDO::FETCH_ASSOC);
        foreach($request as $key){            
            $a= $key['monto']+$num;
        }
        $this->fltPresupuesto = $a;
        $sqll = "UPDATE tbl_peconomica SET monto=? WHERE npartida=$id"; 
        $update = $this->conexion->prepare($sqll); 
        $arraydata = array($this->fltPresupuesto);
        $resExecute = $update->execute($arraydata);
        return $resExecute;     
  }
  public function restar(int $id,float $num)
    {
        $sql = "SELECT * FROM tbl_peconomica WHERE npartida=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetchall(PDO::FETCH_ASSOC);
        foreach($request as $key){            
            $a= $key['monto']-$num;
        }
        $this->fltPresupuesto = $a;
        $sqll = "UPDATE tbl_peconomica SET monto=? WHERE npartida=$id"; 
        $update = $this->conexion->prepare($sqll); 
        $arraydata = array($this->fltPresupuesto);
        $resExecute = $update->execute($arraydata);
        return $resExecute;     
  }
  public function veriPart(int $id,float $num){
    $sql = "SELECT * FROM tbl_peconomica WHERE npartida=$id";
    $arrayWhere = array($id);
    $query = $this->conexion->prepare($sql);
    $query->execute($arrayWhere);
    $request = $query->fetchall(PDO::FETCH_ASSOC);
    foreach($request as $key){            
        $a= $key['monto'];
    }      
    if ($a>$num) {
      return true;
    }else{
        return false;
    }
   
}

}
// $in=new PartidaEco();
// $obj=$in->veriPart(21400,400);
// if ($obj) {
//     $eje=$in->restar(21400,400);
//     echo "transaccion realizada";
// }else{
//     echo "no se puede realizar la transaccion";
// }
?>