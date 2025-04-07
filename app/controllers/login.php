<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}


require_once "../models/login.php";

$method = $_SERVER['REQUEST_METHOD'];
$user = new User();

$data = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || empty($data['username'] || $data['password'])) {
            echo json_encode("Datos faltantes");
        }
        $username = $data['username'];
        $password = $data['password'];
        if ($user->createUser($username, $password)) {

            http_response_code(201);
            echo json_encode("usuario creado correctamente");
        } else {
            http_response_code(500);
            echo json_encode("No se pudo crear usuario ");
        }
        break;
}
