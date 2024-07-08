<?php 
class Conectar{
    protected $dbh;

    public function Conexion(){
        try{
            $conectar = $this->dbh = new PDO("sqlsrv:Server=localhost;Database=CompraVenta", null, null);
            return $conectar;
        }catch(Exception $e){
            print "Error conexion BD: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

$conexionP = new Conectar();
$db = $conexionP->Conexion();

if($db){
    echo "Conexion exitosa";
}else{
    echo "Mala conexion";
}
?>
