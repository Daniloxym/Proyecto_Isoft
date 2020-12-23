<?php

 $con = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    if( isset( $_GET['email'] ) && !empty( $_GET['email'] ) AND isset( $_GET['hash'] ) && !empty( $_GET['hash'] )   ){
        
        
        $email = $_GET['email'];
        
        $hash = $_GET['hash'];
        
        
        
        
        $sql = $con->prepare("SELECT COUNT(*) from estudiantes where correo = '$email' and hash = '$hash' and activo =0 "); 
        
        $sql->execute();
        
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        
        if($resultado[0]>0){ //SIEMPRE ENTRA POR ALGUN MOTIVO
            
            
            $sql = $con->prepare( "update profesores set activo = 1 where correo = '$email' and activo = 0 ");
            
            $sql->execute();
            
            
            $sql = $con->prepare( "update estudiantes set activo = 1 where correo = '$email' and activo = 0 ");
            
            $sql->execute();
            
            
            
            echo '





                <!DOCTYPE html>
                <html lang="es">
                
                <head>
                  <meta charset="utf-8">
                  <title>TUTORIAS ACADEMICAS</title>
                  <meta content="width=device-width, initial-scale=1.0" name="viewport">
                  <meta content="" name="keywords">
                  <meta content="" name="description">
                
                  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
                  <meta property="og:title" content="">
                  <meta property="og:image" content="">
                  <meta property="og:url" content="">
                  <meta property="og:site_name" content="">
                  <meta property="og:description" content="">
                
                  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
                  <meta name="twitter:card" content="summary">
                  <meta name="twitter:site" content="">
                  <meta name="twitter:title" content="">
                  <meta name="twitter:description" content="">
                  <meta name="twitter:image" content="">
                
                  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
                  <link href="favicon.ico" rel="shortcut icon">
                
                  <!-- Google Fonts -->
                  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
                
                  <!-- Bootstrap CSS File -->
                  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                
                  <!-- Libraries CSS Files -->
                  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
                  
                  
                
                
                  <!-- Main Stylesheet File -->
                  <link href="css/style.css" rel="stylesheet">
                  
                  <script
                  src="https://code.jquery.com/jquery-3.5.1.min.js"
                  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                  crossorigin="anonymous"></script>
                
                </head>
                
                <body>
                  <div id="preloader"></div>
                
                  <!--==========================
                  Hero Section
                  ============================-->
                  
                
                  <!--==========================
                  Sección de encabezado
                  ============================-->
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
                          
                          
                          
                          
                          <li><a href="index2">
                          
                          
              
                              <div class ="LOL">
                             
                              Iniciar sesión
                              
                              </div>
                          
                          
                          
                          </a></li>
                        </ul>
                      </nav>
                      <!-- #nav-menu-container -->
                    </div>
                  </header>
                  
                  
                  
                  <!-- #header -->
                
                  <!--==========================
                  About Section
                  ============================-->
                  
                
                  <!--==========================
                  Services Section
                  ============================-->
                  <section id="services">
                    <div class="container wow fadeInUp">
                      <div class="row">
                        <div class="col-md-12">
                          <h3 class="section-title">Cuenta confirmada</h3>
                          <div class="section-title-divider"></div>
                          <p class="section-description"></p>
                        </div>
                      </div>
                
                      <div class="row">
                        
                
                      <h3 class ="col-md-12 col-md-offset-2" ><strong>¡Gracias por confirmar tu cuenta con nuestra pagina de tutorias!</strong></h3>
                
                      
                
                    </div>
                  </section>
                
                  <!--==========================
                  Subscrbe Section
                  ============================-->
                  
                
                  <!--==========================
                  Footer
                ============================-->
                  <footer id="footer">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="copyright">
                            &copy;  All Rights Reserved
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </footer>
                  <!-- #footer -->
                
                  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
                
                  <!-- Required JavaScript Libraries -->
                  <script src="lib/jquery/jquery.min.js"></script>
                  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
                  <script src="lib/superfish/hoverIntent.js"></script>
                  <script src="lib/superfish/superfish.min.js"></script>
                  <script src="lib/morphext/morphext.min.js"></script>
                  <script src="lib/wow/wow.min.js"></script>
                  <script src="lib/stickyjs/sticky.js"></script>
                  <script src="lib/easing/easing.js"></script>
                
                  <!-- Template Specisifc Custom Javascript File -->
                  <script src="js/custom.js"></script>
                
                  <script src="contactform/contactform.js"></script>
                
                
                </body>
                
                </html>
                
                
                
                
                
                
                
                
                
                ';
                            
            
            
            
        }
        
        
        
        else{
           /* 
            $sql = $con->prepare( "update profesores set activo = 1 where correo = '$email' and activo = 0 ");
            
            $sql->execute();
            */
            echo '





<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>TUTORIAS ACADEMICAS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  
  


  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <div id="preloader"></div>

  <!--==========================
  Hero Section
  ============================-->
  

  <!--==========================
  Sección de encabezado
  ============================-->
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
          <li><a href="#services">Servicios</a></li>
          
          <li><a href="#testimonials">Testimonios</a></li>
         
          <li><a href="#contact">Contactanos</a></li>

          <li><a href="registrarse">Registrarse</a></li>
          
          <li><a href="iniciarSe">Iniciar Secion</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->

  <!--==========================
  About Section
  ============================-->
  

  <!--==========================
  Services Section
  ============================-->
  <section id="services">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Cuenta no confirmada</h3>
          <div class="section-title-divider"></div>
          <p class="section-description"></p>
        </div>
      </div>

      <div class="row">
        

      <h3 class ="col-md-12 col-md-offset-2" ><strong>Error en la confirmación vuelva a intentarlo</strong></h3>

      

    </div>
  </section>

  <!--==========================
  Subscrbe Section
  ============================-->
  

  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy;  All Rights Reserved
          </div>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>


</body>

</html>









';
            
            
            
            
        }
        
        
        
    }
    
    else{
        
        echo '





<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>TUTORIAS ACADEMICAS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  
  


  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <div id="preloader"></div>

  <!--==========================
  Hero Section
  ============================-->
  

  <!--==========================
  Sección de encabezado
  ============================-->
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
          <li><a href="#services">Servicios</a></li>
          
          <li><a href="#testimonials">Testimonios</a></li>
         
          <li><a href="#contact">Contactanos</a></li>

          <li><a href="registrarse">Registrarse</a></li>
          
          <li><a href="iniciarSe">Iniciar Secion</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->

  <!--==========================
  About Section
  ============================-->
  

  <!--==========================
  Services Section
  ============================-->
  <section id="services">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Cuenta confirmada</h3>
          <div class="section-title-divider"></div>
          <p class="section-description"></p>
        </div>
      </div>

      <div class="row">
        

      <h3 class ="No se encontraron los datos de la url</strong></h3>

      

    </div>
  </section>

  <!--==========================
  Subscrbe Section
  ============================-->
  

  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy;  All Rights Reserved
          </div>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>


</body>

</html>









';
        
    }




?>