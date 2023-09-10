
<?php


$consulta = "SELECT * FROM usuari WHERE user = '$usuario'";
$ejecuta = $conecta->query($consulta);
$row = $ejecuta->fetch_assoc();
$idUsuari = $row['id'];



/*************************** CONSULTAS HABILIDADES ************************ */
//INSERT
if(isset($_POST['EnviarHabilidad'])){
    $nombreHabilidad = $conecta->real_escape_string($_POST['nomHabilitat']);
    $porcentajeHabilidad = $conecta->real_escape_string($_POST['percentHabilitat']);
    $insertaHabilidad = "INSERT INTO habilitats (idUsuari, habilityName, habilityPercent) VALUES ('$idUsuari', '$nombreHabilidad','$porcentajeHabilidad')";  
    $conecta->query($insertaHabilidad);
}
//DELETE 
if(isset($_REQUEST['hab'])){
    $hab=$_REQUEST['hab'];
    $deleteHabilidad = "DELETE from habilitats WHERE idHabilitats = '$hab'";
    $conecta->query($deleteHabilidad);
}
//LEER
$consultaHabilidades = "SELECT * FROM habilitats WHERE idUsuari = '$idUsuari'";
$ejecutaHabilidades = $conecta->query($consultaHabilidades);

/*************************** CONSULTAS DATOS PERSONALES ************************ */
//INSERT
if(isset($_POST['EnviarDatos'])){
    $datoPersonal = $conecta->real_escape_string($_POST['dadaPersonal']);
    $insertaDatosPersonales = "INSERT INTO datosPersonales (idUsuari, dato) VALUES ('$idUsuari', '$datoPersonal')";  
    $conecta->query($insertaDatosPersonales);
}
//DELETE 
if(isset($_REQUEST['dp'])){
    $dp=$_REQUEST['dp'];
    $deleteDatoPersonal = "DELETE from datosPersonales WHERE idDatosPersonales = '$dp'";
    $conecta->query($deleteDatoPersonal);
}
//UPDATE
if(isset($_REQUEST['dpe'])){
    $dpe = $_REQUEST['dpe'];
    $datoPersonal = $conecta->real_escape_string($_POST['dadaPersonal']);
    $updateDatoPersonal = "UPDATE datosPersonales SET dato='$datoPersonal' WHERE idDatosPersonales = '$dpe'";
    $conecta->query($updateDatoPersonal);
}
//LEER
$consultaDatosPersonales = "SELECT * FROM datosPersonales WHERE idUsuari = '$idUsuari'";
$ejecutaDatosPersonales = $conecta->query($consultaDatosPersonales);


/***************************CONSULTAS IDIOMAS************** */
    //INSERT
    if(isset($_POST['EnviarIdioma'])){
        $nombreIdioma = $conecta->real_escape_string($_POST['nomIdioma']);
        $porcentajeIdioma = $conecta->real_escape_string($_POST['percentIdioma']);
        $insertaIdioma = "INSERT INTO idiomas (idUsuari, idiomaName, idiomaPercent) VALUES ('$idUsuari', '$nombreIdioma','$porcentajeIdioma')";  
        $conecta->query($insertaIdioma);  
    }
    //DELETE 
    if(isset($_REQUEST['idiom'])){
        $idiom=$_REQUEST['idiom'];
        $deleteIdioma = "DELETE from idiomas WHERE idIdiomas = '$idiom'";
        $conecta->query($deleteIdioma);
    }
    //LEER IDIOMA DE BBDD
    $consultaIdiomas = "SELECT * FROM idiomas WHERE idUsuari = '$idUsuari'";
    $ejecutaIdiomas = $conecta->query($consultaIdiomas);

    //UPDATE IDIOMA

/*************************************************************** */


/********************* CONSULTAS INFORMATICA ************************* */
//INSERT
if(isset($_POST['EnviarInformatica'])){
    $nombreInformatica = $conecta->real_escape_string($_POST['nomLlenguatge']);
    $porcentajeInformatica = $conecta->real_escape_string($_POST['percentLlenguatge']);
    $insertaInformatica = "INSERT INTO informatica (idUsuari, nombreLenguaje, porcentajeLenguaje) VALUES ('$idUsuari', '$nombreInformatica','$porcentajeInformatica')";  
    $conecta->query($insertaInformatica);
}
//DELETE
if(isset($_REQUEST['inf'])){
    $inf=$_REQUEST['inf'];
    $deleteInformatica = "DELETE from informatica WHERE idInformatica = '$inf'";
    $conecta->query($deleteInformatica);
}
//LEE (SELECT)
$consultaInformatica = "SELECT * FROM informatica WHERE idUsuari = '$idUsuari'";
$ejecutaInformatica = $conecta->query($consultaInformatica);



/*********************** CONSULTAS COMPETENCIAS********************** */
//INSERT
if(isset($_POST['EnviarCompetencia'])){
    $competencia = $conecta->real_escape_string($_POST['nomCompetencia']);
    $insertaCompetencia = "INSERT INTO competencias (idUsuari, competencia) VALUES ('$idUsuari', '$competencia')";  
    $conecta->query($insertaCompetencia);
}
//DELETE
if(isset($_REQUEST['comp'])){
    $comp=$_REQUEST['comp'];
    $deleteCompetencia = "DELETE from competencias WHERE idCompetencia = '$comp'";
    $conecta->query($deleteCompetencia);
}
//UPDATE
if(isset($_REQUEST['compE'])){
    $compE = $_REQUEST['compE'];
    $competencia = $conecta->real_escape_string($_POST['nomCompetencia']);
    $updateCompetencia = "UPDATE competencias SET competencia='$competencia' WHERE idCompetencia = '$compE'";
    $conecta->query($updateCompetencia);
}
//LEER (Select)
$consultaCompetencias = "SELECT * FROM competencias WHERE idUsuari = '$idUsuari'";
$ejecutaCompetencias = $conecta->query($consultaCompetencias);


/*********************** CONSULTAS PERFIL********************** */
//INSERT
if(isset($_POST['EnviarPerfil'])){
    $perfil = $conecta->real_escape_string($_POST['nomPerfil']);
    $insertaPerfil = "INSERT INTO perfil (idUsuari, parrafoPerfil) VALUES ('$idUsuari', '$perfil')";  
    $conecta->query($insertaPerfil);
}
//DELETE
if(isset($_REQUEST['perf'])){
    $perf=$_REQUEST['perf'];
    $deletePerfil = "DELETE from perfil WHERE idPerfil = '$perf'";
    $conecta->query($deletePerfil);
}
//UPDATE
if(isset($_REQUEST['perfE'])){
    $perfE = $_REQUEST['perfE'];
    $perfil = $conecta->real_escape_string($_POST['nomPerfil']);
    $updatePerfil = "UPDATE perfil SET parrafoPerfil='$perfil' WHERE idPerfil = '$perfE'";
    $conecta->query($updatePerfil);
}
//LEER (Select)
$consultaPerfil = "SELECT * FROM perfil WHERE idUsuari = '$idUsuari'";
$ejecutaPerfil = $conecta->query($consultaPerfil);









// NUEVAS SECCIONES
//INSERT
if(isset($_POST['anyadirSeccion'])){
    $nombreSeccionNueva = $conecta->real_escape_string($_POST['nombreSeccionNueva']);
    $insertaSeccionNueva = "INSERT INTO secciones (nombre) VALUES ('$nombreSeccionNueva')";  
    $conecta->query($insertaSeccionNueva);
}
//LEER
//LEER (Select)
// $consultaSecciones = "SELECT * FROM secciones WHERE idUsuari = '$idUsuari'";
// $ejecutaSeccion = $conecta->query($consultaSecciones);

?>