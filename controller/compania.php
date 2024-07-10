<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Compania.php");

/* TODO: Inicializando claes */

$compania = new Compania();

switch ($_GET["op"]) {
    case "guardarysalir":

        if(empty($_POST["com_id"])){
            $compania->insert_compania($_POST["com_nom"]);
        }else{
            $compania->update_compania($_POST["com_id"], $_POST["com_nom"]);

        }

        break;
    case "listar":
        $datos = $compania->get_compania();
        $data = array();

        foreach($datos as $row){
            $sub_array = array();
            $sub_array = $row["com_nom"];
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
        $datos = $compania -> get_compania_x_com_id($_POST["com_id"]);
        if(is_array($datos) == true && count($datos) > 0){
            foreach($datos as $row){
                $output["com_id"] = $row["com_id"];
                $output["com_nom"] = $row["com_nom"];
            
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
            $compania->delete_compania($_POST["com_id"]);
        break;
}
