<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Unidad.php");

/* TODO: Inicializando claes */

$unidad = new Unidad();

switch ($_GET["op"]) {
    case "guardarysalir":

        if(empty($_POST["und_id"])){
            $unidad->insert_unidad($_POST["suc_id"], $_POST["und_nom"]);
        }else{
            $unidad->update_unidad($_POST["und_id"],$_POST["suc_id"], $_POST["und_nom"]);

        }

        break;
    case "listar":
        $datos = $unidad->get_unidad_x_suc_id($_POST["suc_id"]);
        $data = array();

        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["UND_NOM"];
            $sub_array[] = $row["FECH_CREA"];
           

            $sub_array[] = '<button type="button" onClick="editar(' . $row["UND_ID"] . ')" id="' . $row["UND_ID"] . '" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["UND_ID"] . ')" id="' . $row["UND_ID"] . '" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';

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
        $datos = $unidad -> get_unidad_x_und_id($_POST["und_id"]);
        if(is_array($datos) == true and count($datos) > 0){
            foreach($datos as $row){
                $output["UND_ID"] = $row["UND_ID"];
                $output["SUC_ID"] = $row["SUC_ID"];
                $output["UND_NOM"] = $row["UND_NOM"];
            
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
            $unidad->delete_unidad($_POST["und_id"]);
        break;
}
