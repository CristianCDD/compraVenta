<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Rol.php");

/* TODO: Inicializando claes */

$rol = new Rol();

switch ($_GET["op"]) {
    case "guardarysalir":

        if(empty($_POST["rol_id"])){
            $rol->insert_rol($_POST["suc_id"], $_POST["rol_nom"]);
        }else{
            $rol->update_rol($_POST["rol_id"],$_POST["suc_id"], $_POST["rol_nom"]);

        }

        break;
    case "listar":
        $datos = $rol->get_rol_x_suc_id($_POST["suc_id"]);
        $data = array();

        foreach($datos as $row){
            $sub_array = array();
            $sub_array = $row["rol_nom"];
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
        $datos = $rol -> get_rol_x_rol_id($_POST["rol_id"]);
        if(is_array($datos) == true and count($datos) > 0){
            foreach($datos as $row){
                $output["rol_id"] = $row["rol_id"];
                $output["suc_id"] = $row["suc_id"];
                $output["rol_nom"] = $row["rol_nom"];
            
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
            $rol->delete_rol($_POST["rol_id"]);
        break;
}
