<?php
require_once("autoload.php");
require_once("konectar.php");
class usuario extends Konectar
{
    private $strNombre;
    private $strPaterno;
    private $strMaterno;
    private $strContrasenia;
    private $intCelular;
    private $strCarnet;
    private $strDireccion;
    private $intId_cargo;
    private $intId_carrera;
   
    public function __construct()
    {
        //parent::connect();
        $this->conexion = new Konectar();
        $this->conexion = $this->conexion->connect();
    }
    public function agregar_usuario($nombre, $paterno, $materno, $contra, $cel, $ci, $dir, $cargo, $carrera)
    {
        $this->strNombre = $nombre;
        $this->strPaterno = $paterno;
        $this->strMaterno = $materno;
        $this->strContrasenia = $contra;
        $this->strDireccion = $dir;
        $this->intCelular = $cel;
        $this->strCarnet = $ci;
        $this->intId_cargo = $cargo;
        $this->intId_carrera = $carrera;
        $sql = "insert into tbl_usuario (id_usuario, nombre, ap_paterno, ap_materno, contraseña, numero_celular, ci, direccion, id_cargo, id_carrera)
        values(null, ?,?,?,?,?,?,?,?,?);";
        $insert = $this->conexion->prepare($sql);
        $datos = array(
            $this->strNombre, $this->strPaterno, $this->strMaterno, $this->strContrasenia, $this->intCelular,
            $this->strCarnet, $this->strDireccion, $this->intId_cargo, $this->intId_carrera,
        );
        $inser = $insert->execute($datos);
        return $inser;
        header("location:../menu.php");
    }
    public function verUsuarios()
    {
        $sql = "SELECT* FROM tbl_usuario";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
    public function eliminarUsuario(int $id)
    {
        $sql = "DELETE FROM tbl_usuario WHERE id_usuario=?";
        $arrayWhere = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($arrayWhere);
        return $del;
    }
    public function unUsuario(int $id)
    {
        $sql = "SELECT * FROM tbl_usuario WHERE id_usuario=?";
        $arrayWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetch(PDO::FETCH_ASSOC);
        return $request;
    }
    public function modificarUsuario(int $id, string $nombre, string $paterno, string $materno, string $contra, int $cel, string $ci, string $dir, int $cargo, int $carrera)
    {
        $this->strNombre = $nombre;
        $this->strPaterno = $paterno;
        $this->strMaterno = $materno;
        $this->strContrasenia = $contra;
        $this->intCelular = $cel;
        $this->strCarnet = $ci;
        $this->strDireccion = $dir;
        $this->intId_cargo = $cargo;
        $this->intId_carrera = $carrera;

        $sql = "UPDATE tbl_usuario SET nombre=?,ap_paterno=?,ap_materno=?,contraseña=?,numero_celular=?,ci=?,direccion=?,id_cargo=?,id_carrera=?
        WHERE id_usuario=$id";
        $update = $this->conexion->prepare($sql);
        $arraydata = array(
            $this->strNombre, $this->strPaterno, $this->strMaterno, $this->strContrasenia, $this->intCelular,
            $this->strCarnet, $this->strDireccion, $this->intId_cargo, $this->intId_carrera,
        );
        $resExecute = $update->execute($arraydata);
        return $resExecute;
    }

    public function iniciarSesion(string $nombre, string $contra)
    {

        $this->strNombre = $nombre;
        $this->strContrasenia = $contra;

        $sql = "SELECT U.nombre, U.contraseña, Ca.cargo 
        from tbl_usuario as U join  tbl_cargo as Ca
        WHERE nombre= ? and contraseña=? and U.id_cargo=Ca.id_cargo";

        $arrayWhere = array($this->strNombre,$this->strContrasenia);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrayWhere);
        $request = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($request) {   
            return true;        
        }else{
            return false;
        }
    }
    public function verusuesp(){
        $sql="SELECT U.id_usuario, U.nombre,U.ap_paterno,U.ap_materno,U.contraseña,U.numero_celular,U.ci,U.direccion,
        C.nombre as carrera , Cr.cargo as cargo
        FROM tbl_usuario as U, tbl_carrera as C, tbl_cargo as Cr
        where  U.id_carrera=C.id_carrera and U.id_cargo=Cr.id_cargo;";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
   
}

?>