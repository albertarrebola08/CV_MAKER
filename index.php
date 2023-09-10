<?php
require_once 'includes/database.php';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Nanum+Pen+Script&family=Raleway&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/index.css">


    <title>HomePage</title>
</head>
<body>
    <div class="section container-fluid">
        <div class="container m-auto">
            <div class="BOX m-auto mt-3">
                <h2 class="text-center">CVitae App</h2>
                <h5 class="text-center">by Albert Arrebola</h5>
                <div class="botones text-center mt-4">
                    <button type="button" class="mx-1 btn btn-warning"><a href="login.php">Iniciar sessió</a></button>
                    <button type="button" class="mx-1 btn btn-warning"><a href="registre.php">Registrar-me</a></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>