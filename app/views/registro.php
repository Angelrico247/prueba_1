<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calis Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/style.css">
</head>

<body class="container">

    <form id="user__form" class="container my-2 form">
        <h2 class="text my-3">Registro</h2>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="nombreHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" aria-describedby="apellidoHelp">



            <button type="submit" class="btn btn-primary my-3">registrarse</button>
    </form>
    <div class="text">
        <a href="login.php">Ya tienes cuenta? Inicia sesion aqui</a>
    </div>



    <script src="../../public/jquery.js"></script>
    <script src="../../public/registro.js"></script>
</body>

</html>