<?php
require_once "../../config/auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calis Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>

<body class="container">
    <div class="d-flex justify-content-end">
        <a href="../../config/logout.php"> <button class="btn btn-danger my-3">Cerrar sesion</button> </a>
    </div>

    <form id="clientes__form" class="container my-2">
        <div class="mb-3">
            <input type="hidden" class="form-control" id="id" aria-describedby="nombreHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" aria-describedby="apellidoHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Domicilio</label>
            <input type="text" class="form-control" id="domicilio" aria-describedby="DomicilioHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" aria-describedby="EmailHelp">

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Domicilio</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody id="clientes__table">


        </tbody>
    </table>


    <script src="../../public/jquery.js"></script>
    <script src="../../public/app.js"></script>
</body>

</html>