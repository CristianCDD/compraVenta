<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Sucursal.php");

/* TODO: Inicializando claes */

$sucursal = new Sucursal();

switch ($_GET["op"]) {
    case "guardarysalir":

        if(empty($_POST["emp_id"])){
            $sucursal->insert_sucursal($_POST["com_id"], $_POST["emp_nom"], $_POST["emp_ruc"]);
        }else{
            $sucursal->update_sucursal($_POST["emp_id"], $_POST["com_id"], $_POST["emp_nom"], $_POST["emp_ruc"]);

        }

        break;
    case "listar":
        $datos = $sucursal->get_sucursal_x_emp_id($_POST["emp_id"]);
        $data = array();

        foreach($datos as $row){
            $sub_array = array();
            $sub_array = $row["suc_nom"];
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
        $datos = $sucursal -> get_sucursal_x_emp_id($_POST["emp_id"]);
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
            $sucursal->delete_sucursal($_POST["emp_id"]);
        break;
    
        case "combo":
            $datos = $sucursal->get_sucursal_x_emp_id($_POST["emp_id"]);
            if (is_array($datos) && count($datos) > 0) {
                $html = "<option selected>Seleccionar</option>";
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row['SUC_ID'] . "'>" . $row['SUC_NOM'] . "</option>";
                }
                echo $html;
            } else {
                echo "<option>No hay datos</option>"; // Agrega esto para verificar si realmente no hay datos
            }
            break;
        
}
