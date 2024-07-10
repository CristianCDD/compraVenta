<?php

/* TODO: Llamado de clase */
require_once("../config/conexion.php");
require_once("../models/Producto.php");

/* TODO: Inicializando claes */

$producto = new Producto();

switch ($_GET["op"]) {
    case "guardarysalir":

        if (empty($_POST["prod_id"])) {
            $producto->insert_producto(
                $_POST["suc_id"],
                $_POST["cat_id"],
                $_POST["prod_nom"],
                $_POST["prod_descrip"],
                $_POST["und_id"],
                $_POST["mon_id"],
                $_POST["prod_pcompra"],
                $_POST["prod_pventa"],
                $_POST["prod_stock"],
                $_POST["prod_fechaven"],
                $_POST["prod_img"]
            );
        } else {
            $producto->update_producto(
                $_POST["prod_id"],
                $_POST["suc_id"],
                $_POST["cat_id"],
                $_POST["prod_nom"],
                $_POST["prod_descrip"],
                $_POST["und_id"],
                $_POST["mon_id"],
                $_POST["prod_pcompra"],
                $_POST["prod_pventa"],
                $_POST["prod_stock"],
                $_POST["prod_fechaven"],
                $_POST["prod_img"]
            );
        }

        break;
    case "listar":
        $datos = $producto->get_producto_x_suc_id($_POST["suc_id"]);
        $data = array();

        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array = $row["prod_nom"];
            $sub_array = $row["prod_descrip"];
            $sub_array = $row["prod_pcompra"];
            $sub_array = $row["prod_pventa"];
            $sub_array = $row["prod_stock"];
            $sub_array = $row["prod_fechaven"];
            $sub_array = $row["prod_img"];           
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
        $datos = $producto->get_producto_x_prod_id($_POST["prod_id"]);
        if (is_array($datos) == true && count($datos) > 0) {
            foreach ($datos as $row) {
                $output["prod_id"] = $row["prod_id"];
                $output["cat_id"] = $row["cat_id"];
                $output["prod_nom"] = $row["prod_nom"];
                $output["prod_descrip"] = $row["prod_descrip"];
                $output["prod_pcompra"] = $row["prod_pcompra"];
                $output["prod_pventa"] = $row["prod_pventa"];
                $output["prod_stock"] = $row["prod_stock"];
                $output["prod_fechaveng"] = $row["prod_fechaveng"];
                $output["prod_img"] = $row["prod_img"];


            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
        $producto->delete_producto($_POST["prod_id"]);
        break;
}
