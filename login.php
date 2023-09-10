


<?php

//AQUEST ES EL CÒDI QUE VALIDA LES CREDENCIALS D'INICI DE SESSIÓ DEL USUARI 

//com que no s'ha escrit cap dada al formulari, aquesta linea fa que no salti un error ja que el php_self està esperant
session_start();
error_reporting(0);

require_once 'includes/database.php';

if(isset($_POST['entrar'])){
    
    $usuario = $conecta->real_escape_string($_POST['usuario']);
    //md5 es la manera de xifrar la contrasenya (hash)
    $password = $conecta->real_escape_string(md5($_POST['pass']));
     echo '<br>';

    //CONSULTA A LA BASE DE DADES
    $consulta = "SELECT * FROM usuari WHERE user = '$usuario' and contrasenya = '$password'";
    

    echo '<br>';
    if($resultado = $conecta->query($consulta)){
        
        while($row = $resultado->fetch_array()) {
            // echo $row;
            $userok = $row['user'];
            $passwordok = $row['contrasenya'];
            
        }
        echo $userok;
        echo $passwordok;
        $resultado->close();
    }
    $conecta->close();

    if(isset($usuario) && isset($password)){
        // echo 'EXISTEN RUSER Y RPASS';
        if($usuario == $userok && $password == $passwordok){
            //INICIEM UNA VARIABLE DE SESSIÓ
            $_SESSION['login'] = TRUE;
            $_SESSION['sessionUser'] = $usuario;
            
            header("Location: cv.php");
            
        }else{
            $msg='
        <div class="bg-[red] mt-4 text-white p-2 ">
            Dades incorrectes. Verifica.
        </div>';
        }
    }

    
}

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form page login</title>
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Nanum+Pen+Script&family=Raleway&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="./assets/index.css">
</head>
<body>

    <div class="loginPage container-fluid h-[100%] w-[100%]">
        <div class="containerLogin text-center lg:w-[25%] mt-[20%] mx-auto h-[100%]">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="">
                
                <div class=" mb-3">
                    <input required placeholder="Usuari" name="usuario" type="text" class=" text-center form-control" id="exampleInputUsername1">
                  </div>

                <div class=" mb-3">
                  <input required placeholder="Password" name="pass" type="password" class=" text-center form-control" id="exampleInputPassword1">
                </div>
                
                <div class=" mt-2 px-5 btn btn-warning">
                    <input type="submit" name="entrar" value="Sign In">
                    
                </div>
                <div><?php echo $msg; ?></div>
                

                <p class="fs-6 mt-3 "><a class="notenscompte" href="registre.php">¿No tens compte? Registra't</a></p>
                
                

                
            </form>

            <div class="mt-[38px] p-[12px] bg-[gray] rounded-[0px] text-[white] text-[10px] ">
                    <p>*Si no recordes el username fes <a href="busqueda.php">click aquí</a> <br> (Ampliació)</p>
                    
            </div>
        </div>
        
        
    </div>
</body>
</html>