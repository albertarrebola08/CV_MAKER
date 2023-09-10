<?php
error_reporting(0);
include 'includes/database.php';

$where = "";
if(!empty($_POST)) {
    $valor = $_POST['buscar'];
    if(!empty($valor)) {
        //amb els %% li diem que contingui.
        $where = "WHERE nom LIKE '%$valor%'";
    }
}
$consulta = "SELECT * FROM usuari $where";
$resultado = $conecta->query($consulta);



?>







<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH PAGE </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    
    <div class="container p-5">

        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        
            <div class="row">
                <input type="text" class="col-9 form-control" name="buscar" placeholder="Cerca per nom">
                <button type="submit" name="buscando" value="Buscar" class="mt-3 col-3 btn bg-success btn-success">Buscar</button>
                
            </div>
            <button class="mt-3  btn bg-warning btn-warning"><a href="login.php">Tornar a login</a></button>
            
        </form>
        <?php if($resultado->num_rows>0 ){?>

        
        <table class="table mt-5">
            <thead class="text-muted">
                <th>Nom: </th>
                <th>Cognoms: </th>
                <th>Email: </th>
                <th>Nom d'usuari: </th>
            </thead>
            <tbody>
                <?php while($row = $resultado->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $row['nom']?></td>
                        <td><?php echo $row['cognoms']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['user']?></td>
                    </tr>
                
                <?php }; ?>
            </tbody>
        </table>
        <?php } else{ ?>
            <div class="row pt-0 mt-3 alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    No s'ha trobat cap registre amb el nom indicat.
                </div>
            </div>
            <?php } ?>
    </div>
</body>
</html>