<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Empresa.php");

/* TODO: Inicializando claes */

$empresa = new Empresa();

switch ($_GET["op"]) {
    case "guardarysalir":

        if(empty($_POST["emp_id"])){
            $empresa->insert_empresa($_POST["com_id"], $_POST["emp_nom"], $_POST["emp_ruc"]);
        }else{
            $empresa->update_empresa($_POST["emp_id"], $_POST["com_id"], $_POST["emp_nom"], $_POST["emp_ruc"]);

        }

        break;
    case "listar":
        $datos = $empresa->get_empresa_x_com_id($_POST["com_id"]);
        $data = array();

        foreach($datos as $row){
            $sub_array = array();
            $sub_array = $row["emp_nom"];
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
        $datos = $empresa -> get_empresa_x_emp_id($_POST["emp_id"]);
        if(is_array($datos) == true && count($datos) > 0){
            foreach($datos as $row){
                $output["emp_id"] = $row["emp_id"];
                $output["com_id"] = $row["com_id"];
                $output["emp_nom"] = $row["emp_nom"];
                $output["emp_ruc"] = $row["emp_ruc"];

            
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
            $empresa->delete_empresa($_POST["emp_id"]);
        break;
}
