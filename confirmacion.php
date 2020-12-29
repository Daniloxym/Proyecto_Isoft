<?php
    
    session_start();
    
    $con = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    if($_POST["tipo"]=="registrarE"){   
        $nombre=strtoupper($_POST["nombre"]);
        $apellido=strtoupper($_POST["apellido"]);
        $cedula=$_POST["cedula"];
        $correo =strtoupper($_POST["correo"]);
        $pass =$_POST["pasword"];
        $celular =$_POST["celular"];
        $foto=addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));

        $sql= $con->prepare("SELECT  COUNT(*) FROM estudiantes");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        $antes=$resultado[0];
        
        $password = password_hash($pass,PASSWORD_BCRYPT); 
        
        $hash = md5( rand(0,1000) );
        
        $sql = $con->prepare("INSERT INTO estudiantes(activo,nombre, apellido, cedula, correo, pasword,hash,foto,celular) VALUES (0,'$nombre','$apellido',$cedula ,'$correo', '$password','$hash','$foto',$celular)");
        $sql->execute();

        $sql= $con->prepare("SELECT  COUNT(*) FROM estudiantes");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        $despues=$resultado[0];

        
        
       /* if($antes!=$despues){
            echo json_encode("EL ESTUDIANTE $nombre $apellido FUE REGISTRADO CON EXITO");
        } 
        else {
            echo json_encode("EL ESTUDIANTE $nombre $apellido NO SE PUDO REGISTRAR");
        }*/
    }

    else if($_POST["tipo"]=="registrarP"){
 
        $nombre=strtoupper($_POST["nombre"]);
        $apellido=strtoupper($_POST["apellido"]);
        $cedula=$_POST["cedula"];
        $celular =$_POST["celular"];
        $materia=strtoupper($_POST["materia"]);
        $correo =strtoupper($_POST["correo"]);
        $pass=$_POST["pasword"];
        $foto=addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
        $especialidad= $_POST["especialidad"];

        $password = password_hash($pass,PASSWORD_BCRYPT); 
        
         $hash = md5( rand(0,1000) );
        
        $sql= $con->prepare("SELECT  COUNT(*) FROM profesores");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        $antes=$resultado[0];
        
        $sql = $con->prepare("INSERT INTO profesores(activo,nombre, apellido, cedula, materia, correo, pasword,foto,hash,especialidad,celular) VALUES (0,'$nombre','$apellido',$cedula ,'$materia' , '$correo', '$password','$foto','$hash','$especialidad',$celular)");
        $sql->execute();

        $sql= $con->prepare("SELECT  COUNT(*) FROM profesores");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        $despues=$resultado[0];
        /*if($antes!=$despues){
            echo json_encode("EL PROFESOR $nombre $apellido FUE REGISTRADO CON EXITO");
        } 
        else{
            echo json_encode("EL PROFESOR $nombre $apellido NO SE PUDO REGISTRAR");
            }*/
           
        }

$to = $correo;
$subject = "CONFIRMACION DE CORREO";
$headers = 'From:soporte@tutorias-academicas.com'."\r\n" ;



$message = '
    

    Ya has completado tu registro. Gracias por elegir Tutorias Academicas para aprender.
    
    Tutorias Academicas ofrece todo lo que necesitas para reservar una tutoria rapido y facil.


    
    CORREO: '.$to.'
    
    
    
    Para acceder a tu cuenta, haz click en el siguiente enlace:

    http://tutorias-academicas.com/Registrar?email='.$to.'&hash='.$hash.'



    
    
    !Gracias por registrarte!
    -------------------------

    



            ';

    
    mail($to, $subject, $message, $headers);
    
    echo json_encode($nombre." LE HEMOS ENVIADO UN MENSAJE DE CONFIRMACION AL CORREO PORFAVOR REVISELO.");
 
 
?>