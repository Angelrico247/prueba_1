<?php

session_start();
if (!empty($_SESSION['username'])) {
    header("Location: cliente.php ");
}

require_once "../models/login.php";


$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {


    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User;

    if ($user->login($username, $password)) {
        header("Location: cliente.php");
        exit();
    } else {
        $result = "username o password incorrectos";
        echo json_encode($result);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/style.css">
</head>

<body class="container">

    <form method="POST" class="container my-2 form">

    <h2 class="text my-3">Login</h2>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" aria-describedby="nombreHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" aria-describedby="apellidoHelp">



            <button type="submit" class=" my-3 btn btn-primary">iniciar sesion</button>
    </form>
    <div  class="text" >
        <a href="registro.php">No otienes cuenta? Crea una</a>
    </div>




</body>

</html>