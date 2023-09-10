
<?php 
error_reporting(0);
//recordem la variable de sessió
session_start();
include 'includes/database.php';
//Si no existeix la sessio del usuari, et redirigeix directament a login
$usuario = $_SESSION['sessionUser'];
if(!isset($usuario)){
    header('Location: login.php');
}
require 'includes/consultasDatabase.php';


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV PAGE </title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/c930e4b2cf.js" crossorigin="anonymous"></script>
    <!-- GOOGLE FONTS -->
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Nanum+Pen+Script&family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/index.css">

</head>
<body>

    <div class="contenidoPaginaCV">
    <div class="headerGeneral bg-warning">
        <h2 class="text-[32px] text-center "><span class="text-[#4A4646]">Benvingut/da</span>  <?php echo $row['nom'] . ' ' .$row['cognoms'] ;?></h2>
        
       
        <a href="includes/logout.php">
            <div class="btnLogout d-flex p-3 text-center items-center rounded-[10px] bg-danger text-white">
                <i class="mx-3 text-white fa-solid fa-right-from-bracket"></i>
                <p>Log out</p>
            </div>
        </a>
        
    </div>
                        
        <div class="curriculumA4">
        <header>
            <div class="header container">
                <h2 class="titulo_cv ms-5 text-white"><?php echo $row['nom'].' '.$row['cognoms']?></h2>
            </div>
        </header>
    
        <main class="container  mt-5 justify-content-between ">
            <div class="row d-flex">
                <!-- Columna izquierda -->
                <div class="ps-5 pe-5 col-md-5 col-xs-12 my-4 me-5 colizq ">
                    <div class="img_perfil"></div>
                    <div class="box_datos_personales">
                        <div class="header_box d-flex gap-4 items-center pb-2 justify-between">
                            <p class="Predatory Journals
                            font-weight-bold"><i class="fa-solid fa-angles-right"></i>Datos personales</p>
                            <div class="botonesAddDeleteSection d-flex gap-2">
                                <button class="btn addDatos btn-success text-[10px] "><i class="text-white fa-solid fa-plus mx-auto"></i></button>
                                
                            </div>
                        </div>
                        
                        <div class="lista_datos_personales">
                            <!-- *************************FORMULARIO DATOS PERSONALES ***********-->
                            <form class="formDatos px-2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input class="px-2" type="text" name="dadaPersonal" placeholder="Ej: Telf, Dirección: ">
                                <input class="px-2" type="submit" name="EnviarDatos" value="Añadir">
                            </form>
                            
                            <ul>
                                
                                <li class="list_item"><i class="fa-solid fa-user"></i><?php echo $row['nom'].' '.$row['cognoms']?></li>
                                <li class="list_item"><i class="fa-solid fa-envelope"></i><?php echo $row['email']?></li>
                               
                                <?php while($rowDatosPersonales = $ejecutaDatosPersonales->fetch_assoc())
                                {?>
                                    <li class="list_item">
                                        <a href="cv.php?dp=<?php echo $rowDatosPersonales['idDatosPersonales']?>"><i class="text-danger fa-solid fa-trash ms-[-2px]"></i></a>
                                       
                                        <i data-id="<?php echo $rowDatosPersonales['idDatosPersonales']?>" class="editDatos fa-solid fa-pen-to-square text-success ms-2" ></i>
                                        <span class="contenidoItem"><?php echo $rowDatosPersonales['dato']?></span>
                                    </li>
                                    
                                <?php } ?>
                                <div class="mt-2 formularioEditarDatosPersonales">
                               
                                    <form class="formDatosEdit px-2" action="" method="post">
                                        <input class="px-2" type="text" name="dadaPersonal" placeholder="Ej: Telf, Dirección: ">
                                        <input data-id="" class="btnsubmitDP px-2" type="button" name="updateDatos" value="Actualizar">
                                    </form>
                                </div>                              
                                
                                    
                                
                            </ul>
                        </div>
                    </div>
    
                    <div class="box_habilidades mt-4">
                        <div class="header_box d-flex gap-4 items-center pb-2 justify-between">
                            <p class="font-weight-bold"><i class="fa-solid fa-angles-right"></i>Habilidades</p>
                            <div class="botonesAddDeleteSection d-flex gap-2">
                                <button class="btn addHability btn-success text-[10px] "><i class="text-white fa-solid fa-plus mx-auto"></i></button>
                                
                            </div>
                        </div>
                        <div class="lista_habilidades">
                            <!-- *************************FORMULARIO HABILIDADES ***********-->
                            <form class="formHabilidades" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input class="px-2" type="text" name="nomHabilitat" placeholder="Habilitat">
                                <input class="mt-2 px-2" type="number" name="percentHabilitat" placeholder="% de domini">
                                <input class="px-2" type="submit" name="EnviarHabilidad" value="Añadir">
                            </form>
                            <ul>
                            <?php while($rowHabilidades = $ejecutaHabilidades->fetch_assoc()){?>
                                
                                <li class="list_item">
                                <a href="cv.php?hab=<?php echo $rowHabilidades['idHabilitats']?>"><i class="text-danger fa-solid fa-trash ms-[-2px]"></i></a>
                                    <p class="w-50"><?php echo $rowHabilidades['habilityName']?></p>
                                    <div class="item_progress mx-2 w-50">
                                        <div class="progress ">
                                            <div class="progress-bar gray" role="progressbar" style="width:<?php echo $rowHabilidades['habilityPercent']?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                                <?php }; ?>
                                <div class="mt-2 formularioEditarHabilidades">
                                    <form class="formHabilidadesEdit px-2" action="" method="post">
                                        <input class="px-2" type="text" name="nomHabilitat" placeholder="Ej: Telf, Dirección: ">
                                        <input class="px-2" type="text" name="percentHabilitat" placeholder="Domini del 1 al 100">
                                        <input data-id="" class="btnsubmit px-2" type="button" name="updateHabilidades" value="Actualizar">
                                    </form>
                                </div>
                            </ul>
                        </div>
                    </div>
    
    
                    <div class="box_idiomas mt-4">
                        <div class="header_box d-flex gap-4 items-center pb-2 justify-between">
                            <p class="font-weight-bold"><i class="fa-solid fa-angles-right"></i>Idiomas</p>
                            <div class="botonesAddDeleteSection d-flex gap-2">
                                <button class="btn addIdiom btn-success text-[10px] "><i class="text-white fa-solid fa-plus mx-auto"></i></button>
                            </div>
                        </div>
                        <div class="lista_idiomas">
                            <!-- *************************FORMULARIO IDIOMAS ***********-->
                            <form class="formIdiomas" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input class="px-2" type="text" name="nomIdioma" placeholder="Idioma">
                                <input class="mt-2 px-2" type="number" name="percentIdioma" placeholder="Domini del 1 al 100">
                                <input class="" type="submit" name="EnviarIdioma" value="Añadir">
                            </form>
                            <!-- ****************************************************** -->
                            <ul>
                            <?php while($rowIdiomas = $ejecutaIdiomas->fetch_assoc()){?>   
                                <li class="list_item"> 
                                <a href="cv.php?idiom=<?php echo $rowIdiomas['idIdiomas']?>"><i class="text-danger fa-solid fa-trash ms-[-2px]"></i></a>
                                    <p class="w-50"><?php echo $rowIdiomas['idiomaName']?></p>
                                    <div class="item_progress mx-2 w-50">
                                        <div class="progress ">
                                            <div class="progress-bar gray" role="progressbar" style="width:<?php echo $rowIdiomas['idiomaPercent']?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                            <?php }; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="box_informatica mt-4">
                        <div class="header_box d-flex gap-4 items-center pb-2 justify-between">
                            <p class="font-weight-bold"><i class="fa-solid fa-angles-right"></i>Informática</p>
                            <div class="botonesAddDeleteSection d-flex gap-2">
                                <button class="btn addInformatica btn-success text-[10px] "><i class="text-white fa-solid fa-plus mx-auto"></i></button>
                                
                            </div>
                        </div>
                        <div class="lista_idiomas">
                            <!-- *************************FORMULARIO INFORMATICA ***********-->
                            <form class="formInformatica" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input class="px-2" type="text" name="nomLlenguatge" placeholder="Coneixements informàtics">
                                <input class="mt-2 px-2" type="number" name="percentLlenguatge" placeholder="Domini del 1 al 100">
                                <input class="" type="submit" name="EnviarInformatica" value="Añadir">
                            </form>
                            <ul>
                            <?php while($rowInformatica = $ejecutaInformatica->fetch_assoc()){?> 
                                <li class="list_item">
                                <a href="cv.php?inf=<?php echo $rowInformatica['idInformatica']?>"><i class="text-danger fa-solid fa-trash ms-[-2px]"></i></a>
                                    <p class="w-50"><?php echo $rowInformatica['nombreLenguaje']?></p>
                                    <div class="item_progress mx-2 w-50">
                                        <div class="progress ">
                                            <div class="progress-bar gray" role="progressbar" style="width:<?php echo $rowInformatica['porcentajeLenguaje']?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                            <?php }; ?>                                
                            </ul>
                        </div>
                    </div>
    
    
                    <div class="box_informatica mt-4">
                        <div class="header_box d-flex gap-4 items-center pb-2 justify-between">
                            <p class="font-weight-bold"><i class="fa-solid fa-angles-right"></i>Competencias</p>
                            <div class="botonesAddDeleteSection d-flex gap-2">
                                <button class="btn addCompetencia btn-success text-[10px] "><i class="text-white fa-solid fa-plus mx-auto"></i></button>
                                
                            </div>
                        </div>
                        <div class="lista_informatica">
                            <!-- *************************FORMULARIO COMPETENCIA ***********-->
                            <form class="formCompetencias" action="cv.php" method="post">
                                <input class="px-2" type="text" name="nomCompetencia" placeholder="Competència">
                                <input class="px-2" type="submit" name="EnviarCompetencia" value="Añadir">
                            </form>
                            <ul>
                            <?php while($rowCompetencias = $ejecutaCompetencias->fetch_assoc())
                                {?>
                                
                                <li class="list_item">
                                    
                                    <a href="cv.php?comp=<?php echo $rowCompetencias['idCompetencia']?>"><i class="text-danger fa-solid fa-trash ms-[-2px]"></i></a>
                                    <i data-id="<?php echo $rowCompetencias['idCompetencia']?>" class="editDatos fa-solid fa-pen-to-square text-success ms-2" ></i>
                                    <span class="contenidoItem"><?php echo $rowCompetencias['competencia']?></span>
                                    
                                    
                                </li>
                                <?php }; ?>
                                <div class="mt-2 formularioEditarCompetencias">
                               
                                    <form class="formCompetenciasEdit px-2" action="cv.php" method="post">
                                        <input class="px-2" type="text" name="nomCompetencia" placeholder="Escriu aquí">
                                        <input data-id="" class="btnsubmitC px-2" type="button" name="updateCompetencia" value="Actualizar">
                                    </form>
                                </div>
                            </ul>

                        </div>
                    </div>
    
                    
                </div>
            
                <!-- Columna derecha -->
                
                    <div class="ps-5 pe-5 col-md-6 col-xs-12 colder ">
                        <div class="box_perfil">
                            <div class="header_box d-flex items-center pb-2 justify-between">
                                <p class="font-weight-bold"><i class="fa-solid fa-angles-right"></i>Perfil</p>
                                <div class="botonesAddDeleteSection d-flex gap-2">
                                    <button class="btn addPerfil btn-success text-[10px] "><i class="text-white fa-solid fa-plus mx-auto"></i></button>
                                    
                                </div>
                                
                            </div>
                            <div class="parrafo_perfil text-justify">
                                <!-- *************************FORMULARIO COMPETENCIA ***********-->
                                <form class="formPerfil" action="cv.php" method="post">
                                    <textarea class="my-2 form-control" type="textarea" name="nomPerfil" placeholder="¿Cómo te defines: ?"></textarea>
                                    <input class="px-2" type="submit" name="EnviarPerfil" value="Añadir">
                                </form>
                                <!-- **************************** -->
                                <?php while($rowPerfil = $ejecutaPerfil->fetch_assoc()){?>
                                    <div class="d-flex gap-2 ">
                                        <a href="cv.php?perf=<?php echo $rowPerfil['idPerfil']?>">
                                        <i class="text-danger fa-solid fa-trash ms-[-2px]"></i></a><p class="">
                                        <i data-id="<?php echo $rowPerfil['idPerfil']?>" class="editDatos fa-solid fa-pen-to-square text-success ms-2" ></i>
                                        <span class="contenidoItem"><?php echo $rowPerfil['parrafoPerfil']?></span>
                                        
                                    </div>
                                <?php }; ?>
                                <div class="mt-2 formularioEditarPerfil">
                                    <form class="formPerfilEdit px-2" action="cv.php" method="post">
                                        <textarea class="px-2" type="text" name="nomPerfil" placeholder="Escriu aquí"></textarea>
                                        <input data-id="" class="btnsubmitP px-2" type="button" name="updatePerfil" value="Actualizar">
                                    </form>
                                </div>

                            </div>
                        </div>
    
                        <!-- NUEVAS SECCIONES -->
                        <div class="box_new">
                            <div class="header_box d-flex items-center pb-2 justify-between">
                                <form action="cv.php" method="post" class="d-block d-flex gap-2 items-center formSection">
                                    <i class="fa-solid fa-angles-right"></i>
                                    <input placeholder="Nombre de la sección"class="text-center font-weight-bold" name="nombreSeccionNueva">
                                    <div class="botonesAddDeleteSection d-flex gap-2">
                                        <button type="submit" class="ms-2 btn font-weight addSection bg-warning text-[10px]" name="anyadirSeccion"><span class="text-white mx-auto">CREAR</span></button>
                                        <button class="btn addItems btn-success text-[10px]"><i class="text-white fa-solid fa-plus mx-auto"></i></button> 
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        <!-- *************** -->

                        <div class="box_experiencias mt-4">
                            <div class="header_box">
                                <p class="font-weight-bold"><i class="fa-solid fa-angles-right"></i>Experiencias de trabajo</p>
                            </div>
                            <div class="parrafo_experiencias">
                                <div class="row">
                                    <div class="col-5">01/06 - Presente</div>
                                    <div class="col-7">
                                        <p class="fw-bold">Consultor SAP</p>
                                        <p class="place">Bunge Cono Bur</p>
                                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos error aliquid fuga asperiores optio! Harum animi explicabo quia, impedit magnam id quaerat magni unde sequi fuga distinctio quas cupiditate in.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">29/09 - 01/2021</div>
                                    <div class="col-7 ">
                                        <p class="fw-bold">Consultor SAP FICO Sr.</p>
                                        <p class="place">Botflick, Buenos Aires</p>
                                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.Quos error aliquid fuga asperiores optio! 
                                            <ul>
                                                <li>Banc Sabadell</li>
                                                <li>La Caixa</li>
                                                <li>Laboratorios Tred Quick</li>
                                                <li>Investigación y desarrollo práctico.</li>
                                            </ul>
                                            </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">04/2021 - 11/2022</div>
                                    <div class="col-7 ">
                                        <p class="fw-bold">Especialista SAP FI</p>
                                        <p class="place">Accenture Argentina</p>
                                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos error aliquid fuga asperiores optio! Harum animi explicabo quia, impedit magnam id quaerat magni unde sequi fuga distinctio quas cupiditate in.</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
    
                        <div class="box_educación mt-4">
                            <div class="header_box">
                                <p class="font-weight-bold"><i class="fa-solid fa-angles-right"></i>Educación</p>
                            </div>
                            <div class="row">
                                <div class="col-5">29/09 - Presente</div>
                                <div class="col-7">
                                    <p>Contador Público.</p>
                                    <p>Universidad de Buenos Aires (UBA)</p>
                                    <p>Promedio: 9.2</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Quos error aliquid fuga asperiores optio! 
                                        <ul>
                                            <li>Banc Sabadell</li>
                                            <li>La Caixa</li>
                                            <li>Laboratorios Tred Quick</li>
                                            <li>Investigación y desarrollo práctico.</li>
                                        </ul>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
           
        </main>
    </div>

    </div>
    <!-- Deteccion de eventos con JavaScript ES6 -->
    <script><?php include 'assets/script.js';?></script>
    <!-- Styles solo para esta pagina -->
    <style>
        
        .curriculumA4 form{
            font-family:helvetica;
            font-size:14px;
            color:black;
            display:none;
        }
        .curriculumA4 input{
            border:solid 1px black;
            border-radius:3px;
        }
    </style>
</body>
</html>

