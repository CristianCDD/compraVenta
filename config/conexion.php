<?php 
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("sqlsrv:Server=DESKTOP-6221JPI;Database=CompraVenta", null, null);
                return $conectar;
            }catch(Exception $e){
                print "Error conexion BD" . $e->getMessage() . "<br/>";
                die();
            }
        }
    }

?>