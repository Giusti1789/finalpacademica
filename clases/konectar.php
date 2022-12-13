<?php 
class Konectar{
    private $host="localhost";
    private $user="root";
    private $password="";
    private $db="sisadmin";
    private $conect;
    
    public function __construct(){
        $conectionString="mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";

        try {
            $this->conect=new PDO($conectionString,$this->user,$this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo"conexion exitosa";
        } catch (Exception $e) {
            $this->conect='Error de conexion';
            echo"ERROR: ".$e->getMessage();    
        }
    }
    public function connect(){
        return $this->conect;
    }

    
    function conectar(){
        try {
            $conexion="mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
            $options=[
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo=new PDO($conexion,$this->user,$this->password,$options);
            return $pdo;
            
        } catch (PDOException $e) {
            echo"Error de conexion: ".$e->getMessage();
            exit;
        }
    }
}
?>