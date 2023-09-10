<?php
//requerim l'arxiu config.php que es on tenim les variables de configuració perque les reconegui
require_once 'config.php';

//utilitzem aquest mètode de php per connectarnos a la bd
$conecta = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

//si no es pot, escribim un error i l'indiquem al usuari
if($conecta->connect_error){
    die("Error connecting to database: ".$conecta->connect_error);
}


?>
