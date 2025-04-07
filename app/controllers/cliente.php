<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}


require_once "../models/cliente.php";

$method = $_SERVER['REQUEST_METHOD'];
$cliente = new Cliente();
$data = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'POST':
        if (!$data || empty($data['nombre']) ||empty ($data['apellido']) || empty($data['domicilio']) || empty($data['email'])) {
            echo json_encode("Datos faltantes");
        }


        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $domicilio = $data['domicilio'];
        $email = $data['email'];


        if ($cliente->createClient($nombre, $apellido, $domicilio, $email)) {

            http_response_code(201);
            echo json_encode("Cliente creado correctamente");
        } else {
            http_response_code(500);
            echo json_encode("No se pudo crear cliente ");
        }
        break;


    case 'GET':
        $clientes = $cliente->getAll();
        if ($clientes) {
            http_response_code(200);
            echo json_encode($clientes);
        } else {
            http_response_code(404);
            echo json_encode("No hay clientes para cargar");
        }
        break;

    case 'DELETE':
        if (!$data || empty($data['id'])) {
            echo json_encode("Falta id faltantes");
        }

        $id = $data['id'];
        if ($cliente->deleteClient($id)) {
            http_response_code(200);
            echo json_encode("Cliente eliminado correctamente");
        } else {
            http_response_code(500);
            echo json_encode("No se pudo eliminar cliente ");
        }
        break;


    case 'PUT':

        if (!$data || empty($data['id']) || empty($data['nombre'] || $data['apellido'] || $data['domicilio'] || $data['email'])) {
            echo json_encode("Datos faltantes");
        }

        $id = $data['id'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $domicilio = $data['domicilio'];
        $email = $data['email'];

        if ($cliente->updateClient($id, $nombre, $apellido, $domicilio, $email)) {
            http_response_code(200);
            echo json_encode("Cliente actualizado correctamente");
        } else {
            http_response_code(500);
            echo json_encode("No se pudo actualizar cliente ");
        }
        break;

    default:
        http_response_code(505);
        echo json_decode("metodo no soportado");
        break;
}
