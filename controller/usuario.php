<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Usuario.php");

/* TODO: Inicializando claes */

$usuario = new Usuario();

switch ($_GET["op"]) {
    case "guardarysalir":

        if(empty($_POST["usu_id"])){
            $usuario->insert_usuario(
            $_POST["suc_id"], 
            $_POST["usu_correo"], 
            $_POST["usu_nom"], 
            $_POST["usu_ape"], 
            $_POST["usu_dni"], 
            $_POST["usu_telf"], 
            $_POST["usu_pass"], 
            $_POST["rol_id"]

);
        }else{
            $usuario->update_usuario(
                $_POST["usu_id"], 
                $_POST["suc_id"], 
                $_POST["usu_correo"], 
                $_POST["usu_nom"], 
                $_POST["usu_ape"], 
                $_POST["usu_dni"], 
                $_POST["usu_telf"], 
                $_POST["usu_pass"], 
                $_POST["rol_id"]
        );

        }

        break;
    case "listar":
        $datos = $usuario->get_usuario_x_suc_id($_POST["suc_id"]);
        $data = array();

        foreach($datos as $row){
            $sub_array = array();
            $sub_array = $row["usu_correo"];
            $sub_array = $row["usu_nom"];
            $sub_array = $row["usu_ape"];
            $sub_array = $row["usu_dni"];
            $sub_array = $row["usu_telf"];
            $sub_array = $row["usu_pass"];
            $sub_array = $row["rol_id"];
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
        $datos = $usuario -> get_usuario_x_usu_id($_POST["usu_id"]);
        if(is_array($datos) == true && count($datos) > 0){
            foreach($datos as $row){
                $output["usu_id"] = $row["usu_id"];
                $output["suc_id"] = $row["suc_id"];
                $output["usu_nom"] = $row["usu_nom"];
                $output["usu_ape"] = $row["usu_ape"];
                $output["usu_correo"] = $row["usu_correo"];
                $output["usu_dni"] = $row["usu_dni"];
                $output["usu_telf"] = $row["usu_telf"];
                $output["usu_pass"] = $row["usu_pass"];
                $output["rol_id"] = $row["rol_id"];

            
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
        break;
}
