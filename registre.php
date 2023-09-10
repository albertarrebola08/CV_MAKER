<?php
error_reporting(0);
include 'includes/database.php';
if(isset($_POST['registrar'])){
    
    $nom = $conecta->real_escape_string($_POST['nameR']);
    $cognoms = $conecta->real_escape_string($_POST['cognomsR']);
    $emailR = $conecta->real_escape_string($_POST['emailR']);
    $usuariR = $conecta->real_escape_string($_POST['userR']);
    $passwordR = $conecta->real_escape_string(md5($_POST['passR']));
   

    $validar = "SELECT * FROM usuari WHERE user = '$usuariR' || email = '$emailR'";
    $validando = $conecta->query($validar);
    if($validando->num_rows > 0){
        $msg='<div class="bg-[red] mt-4 text-white p-2 ">
        Aquest usuari o mail ja està registrat.
    </div>'; 
    }else{

        //insertem les dades 
        $insertar = "INSERT INTO usuari (nom, cognoms, email, user, contrasenya)VALUES('$nom','$cognoms','$emailR','$usuariR','$passwordR')";
        $guardando = $conecta->query($insertar);
        if($guardando > 0){
            $msg='<div class="bg-[green] mt-4 text-white p-2 ">
            Estàs registrat/da amb èxit.
        </div>';
        }else{
            $msg='<div class="bg-[red] mt-4 text-white p-2 ">
            Hi ha un error amb el teu registre...
        </div>';
        }
    }   
}

// EMAIL FUNCION
	$to = $emailR;
    $asunto = "Hola";
    $message = "Benvingut al CV Maker d''Albert Arrebola";
    $from = "albertarrebola8@gmail.com";
    $headers = "From: " . $from;

	mail($to, $subject, $message, $headers);
// Fin email function

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
<div class="container-fluid ">
        <div class="container text-center p-3 mt-[10%] lg:w-[60%] bg-[#D7DCDB] mx-auto">
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="w-[50]">
                
                <div class="mb-3">
                    
                    <input required placeholder="Nom" name="nameR" type="text" class="form-control" id="exampleInputNom">
                </div>
                <div class="mb-3">
                    
                    <input required placeholder="Cognoms" name="cognomsR" type="text" class="form-control" id="exampleInputcognoms">
                </div>
                <div class="mb-3">
                    
                    <input required placeholder="Email" name="emailR" type="email" class="form-control" id="exampleInputemail">
                </div>
                <div class="mb-3">
                    
                    <input required placeholder="Username" name="userR" type="text" class="form-control" id="exampleInputUsername1">
                </div>


                <div class="mb-3">
                  
                  <input placeholder="Password" name="passR" type="password" minlength="8" required class="form-control" id="exampleInputPassword1">
                </div>
                
                <div class="mt-[20px] px-5 btn btn-warning">
                    <input type="submit" name="registrar" value="Registrarme" >
                </div>
                <?php echo $msg; ?>
                <p class="fs-6 mt-3 mb-0 pb-5"><a href="login.php">¿Ja tens un compte creat? <b>Inicia sessió</a></b></p>
                
            </form>
        </div>
       
        
    </div>
</body>
</html>