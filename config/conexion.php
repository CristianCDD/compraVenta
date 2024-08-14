<?php
session_start();
class Conectar
{
    protected $dbh;

    public function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("sqlsrv:Server=localhost;Database=CompraVenta", null, null);
            return $conectar;
        } catch (Exception $e) {
            print "Error conexion BD: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function ruta()
    {
        return "http://localhost/proyectos/compraVenta/";
    }
}
