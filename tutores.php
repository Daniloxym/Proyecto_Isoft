<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="lib/animate-css/animate.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="estilo2.css">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/tutores.css">

  <title>TUTORIAS ACADEMICAS</title>
</head>
<body>
<header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="index"><img src="img/logo.png" alt="" title="" /></img></a>
        <!-- Descomenta abajo si prefieres usar una imagen de texto -->
        <!--<h1><a href="#hero">Encabezado 1</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index">Inicio</a></li>
          <!-- <li><a href="#about">Sobre nosotros</a></li>
          <li><a href="#services">Servicios</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#testimonials">Testimonios</a></li> -->
          <li><a href="#team">Equipo</a></li>
          
          <li><a href="#contact">Contactanos</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>

  <div class="container wow fadeInUp">
      <div class="row">

        <h1 id = "mostrar"></h1>
        <div class="col-md-12">
          <h3 class="section-title">Nuestros tutores</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">ESTOS SON LOS TUTORES QUE TENEMOS DISPONIBLES</p>
        </div>
      </div>
    <div id="contenedor" class="contenedor-tutores">
        <?php
        $conn = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql= $conn->prepare("SELECT * FROM profesores");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $row){
        ?>
            <div class="tutores-t">
                <img src="data:image/jpg;base64,<?php echo base64_encode($row["foto"]);?>" cover>
                <h3><?php echo $row["nombre"]." ".$row["apellido"]?></h3>
                <p><?php echo "TUTOR DE ".$row["materia"]?></p>
            
            </div>
            
        <?php
            }
        ?>
      
    </div>
   </div>
</body>
</html>