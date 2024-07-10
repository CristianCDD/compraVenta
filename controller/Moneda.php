<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Moneda.php");

/* TODO: Inicializando claes */

$moneda = new Moneda();

switch ($_GET["op"]) {
    case "guardarysalir":

        if(empty($_POST["mon_id"])){
            $moneda->insert_moneda($_POST["suc_id"], $_POST["mon_nom"]);
        }else{
            $moneda->update_moneda($_POST["mon_id"],$_POST["suc_id"], $_POST["mon_nom"]);

        }

        break;
    case "listar":
        $datos = $moneda->get_moneda_x_suc_id($_POST["suc_id"]);
        $data = array();

        foreach($datos as $row){
            $sub_array = array();
            $sub_array = $row["mon_nom"];
            $sub_array = "Editar";
            $sub_array = "Eliminar";
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecord" => count($data),
            "iTotalDisplayRecords" => count($data),
            "asData" => $data
        );

        echo json_encode($results);
        break;

    case "mostrar":
        $datos = $moneda -> get_moneda_x_mon_id($_POST["mon_id"]);
        if(is_array($datos) == true and count($datos) > 0){
            foreach($datos as $row){
                $output["mon_id"] = $row["mon_id"];
                $output["suc_id"] = $row["suc_id"];
                $output["mon_nom"] = $row["mon_nom"];
            
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
            $moneda->delete_moneda($_POST["mon_id"]);
        break;
}
