<?php
$mysqli = mysqli_connect ("localhost", "root", "", "ankali");
$conn = mysqli_connect ("localhost", "root", "", "ankali");



class  Db{
    private static $conexion=NULL;
    private function __construct(){}

    public static function Conectar(){
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        self::$conexion= new PDO('mysql:host=localhost;dbname=ankali','root','',$pdo_options);
        return self::$conexion;
    }	
    
    static function CerrarConexion(&$conn) {
        $conn=null;
    }
}

$Db=Db::Conectar(); 
?>

