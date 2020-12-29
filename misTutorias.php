<?php
    session_start();
     
    try{
     $conn = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     if(isset($_SESSION["cedula"])){
        $cedula=$_SESSION["cedula"];
        }
     else{
            $res["nombre"]=null;
            echo json_encode($res);
        }
     
     
    if($_POST["tipo"]=="Estudiante"){
        $sql=$conn->prepare("SELECT idTutoria,idTutor,star,link FROM tutorias WHERE idEstudiante=$cedula");
         $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); 
        
          if(isset($resultado)){
              
            $cont=0;
            foreach ($resultado as $row) {
                
                 $idTutor=$row["idTutor"];
                $sql2=$conn->prepare("SELECT nombre,apellido,foto FROM profesores WHERE cedula=$idTutor");
                $sql2->execute();
                $resultado2= $sql2->fetchAll(PDO::FETCH_ASSOC);
                
                 foreach($resultado2 as $row2){
                    $res["nombreT"]=$row2["nombre"];
                    $res["apellidoT"]=$row2["apellido"];
                    $res["fotoT"]="".base64_encode($row2["foto"]);
                 break;
                } 
                $res["fecha"]=$row["star"];
                $res["idTutoria"]=$row["idTutoria"];
                $res["link"]=$row["link"];
                $respuesta[$cont]=$res;
                $cont++; 
            }
            echo json_encode($respuesta);
        } 
        
     } 
     else if($_POST["tipo"]=="Profesor") {
        $sql=$conn->prepare("SELECT idTutoria,idEstudiante,star,link FROM tutorias WHERE idTutor='$cedula'");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        if(isset($resultado)){
            $cont=0;
            foreach ($resultado as $row) {
                $idEstudiante=$row["idEstudiante"];
                $sql2=$conn->prepare("SELECT nombre,apellido,foto FROM estudiantes WHERE cedula='$idEstudiante'");
                $sql2->execute();
                $resultado2= $sql2->fetchAll(PDO::FETCH_ASSOC);
                foreach($resultado2 as $row2){
                    $res["nombreE"]=$row2["nombre"];
                    $res["apellidoE"]=$row2["apellido"];
                    $res["fotoE"]="".base64_encode($row2["foto"]);
                }
                $res["fecha"]=$row["star"];
                $res["idTutoria"]=$row["idTutoria"];
                $res["link"]=$row["link"];
                $respuesta[$cont]=$res;
                $cont++;
            }
            echo json_encode($respuesta);
        }
     
        
        
     }
     else if($_POST["tipo"]=="Profesor_Estudiantes") {
        $sql=$conn->prepare("SELECT distinct idEstudiante FROM tutorias WHERE idTutor='$cedula'");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        if(isset($resultado)){
            $cont=0;
            foreach ($resultado as $row) {
                $idEstudiante=$row["idEstudiante"];
                $sql2=$conn->prepare("SELECT nombre,apellido,foto FROM estudiantes WHERE cedula='$idEstudiante'");
                $sql2->execute();
                $resultado2= $sql2->fetchAll(PDO::FETCH_ASSOC);
                foreach($resultado2 as $row2){
                    $res["nombreE"]=$row2["nombre"];
                    $res["apellidoE"]=$row2["apellido"];
                    $res["fotoE"]="".base64_encode($row2["foto"]);
                }
                $respuesta[$cont]=$res;
                $cont++;
            }
            echo json_encode($respuesta);
        } 
        
     } 
     

    }catch(Exception $e){


        echo json_encode(null);

    }
?>