<?php
require_once("autoload.php");

class Carrera extends Konectar{
    private $strNombre;
    private $fltPresupuesto;
    private $cone;

    public function __construct()
    {
        // parent::Conexion();
        $this->conexion = new Konectar();
        $this->conexion = $this->conexion->connect();
    }

    public function agregarCarrera(string $nombre, float $presupuesto){
        $this->strNombre = $nombre;
        $this->fltPresupuesto = $presupuesto;

        $sql = "INSERT INTO tbl_carrera(nombre,presupuesto)VALUES (?,?)";
        $insert = $this->conexion->prepare($sql);
        $datos = array($this->strNombre, $this->fltPresupuesto);
        $inser = $insert->execute($datos);
        $idInsert = $this->conexion->lastInsertId();
        return $idInsert;
    }
    public function verCarrera()
    {
        $sql = "SELECT* FROM tbl_carrera";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function modificarCarrera(int $id, string $nombre, float $presupuesto)
    {
        $this->strNombre = $nombre;
        $this->fltPresupuesto = $presupuesto;
        $sql = "UPDATE tbl_carrera SET nombre=?,presupuesto=? WHERE id_carrera=$id";
        $update = $this->conexion->prepare($sql);
        $arraydata = array($this->strNombre, $this->fltPresupuesto);
        $resExecute = $update->execute($arraydata);
        return $resExecute;
    }
    
    public function unRegistro(int $id)
    {
        $sql = "SELECT * FROM tbl_carrera WHERE id_carrera=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetch(PDO::FETCH_ASSOC);
        return $request;
    }
    public function eliminarCarrera(int $id)
    {
        $sql = "DELETE FROM tbl_carrera WHERE id_carrera=?";
        $arrayWhere = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($arrayWhere);
        return $del;
    }
    public function sumar(int $id,float $num)
    {
        $sql = "SELECT * FROM tbl_carrera WHERE id_carrera=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetchall(PDO::FETCH_ASSOC);
        foreach($request as $key){            
            $a= $key['presupuesto']+$num;
        }
        $this->fltPresupuesto = $a;
        $sqll = "UPDATE tbl_carrera SET presupuesto=? WHERE id_carrera=$id"; 
        $update = $this->conexion->prepare($sqll); 
        $arraydata = array($this->fltPresupuesto);
        $resExecute = $update->execute($arraydata);
        return $resExecute;     
  }

  public function restar(int $id,float $num)
    {
        $sql = "SELECT * FROM tbl_carrera WHERE id_carrera=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetchall(PDO::FETCH_ASSOC);
        foreach($request as $key){            
            $a= $key['presupuesto']-$num;
        }
        $this->fltPresupuesto = $a;
        $sqll = "UPDATE tbl_carrera SET presupuesto=? WHERE id_carrera=$id"; 
        $update = $this->conexion->prepare($sqll); 
        $arraydata = array($this->fltPresupuesto);
        $resExecute = $update->execute($arraydata);
        return $resExecute;     
  }
  public function veriCarr(int $id,float $num){
    $sql = "SELECT * FROM tbl_carrera WHERE id_carrera=$id";
    $arrayWhere = array($id);
    $query = $this->conexion->prepare($sql);
    $query->execute($arrayWhere);
    $request = $query->fetchall(PDO::FETCH_ASSOC);
    foreach($request as $key){            
        $a= $key['presupuesto'];
    }      
    if ($a>$num) {
      return true;
    }else{
        return false;
    }
}
  
}
// $in=new Carrera();
// $obj=$in->veriCarr(2,400);
// if ($obj) {
//     $eje=$in->restar(2,400);
//     echo "transaccion realizada";
// }else{
//     echo "no se puede realizar la transaccion";
// }
?>
