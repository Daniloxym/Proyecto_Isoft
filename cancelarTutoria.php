<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization, methodHttp");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
//header('Content-Type: application/json');
session_start();
   

try{
    $con = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    if(isset($_SESSION["cedula"])){
        $cedula=$_SESSION["cedula"];
    }
    
    if($_POST["tipo"]=="cancelar-tutoria"){
        $idTutoria=$_POST["idTutoria"];
         $razon=$_POST["razon"];
         $sql= $con->prepare("SELECT star,idEstudiante,idTutor FROM tutorias WHERE idTutoria=$idTutoria");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        if(isset($resultado)){
            foreach ($resultado as $row){
                $fecha=$row["star"];
                $idEstudiante=$row["idEstudiante"];
                $idTutor=$row["idTutor"];
                if($cedula==$row["idEstudiante"]){
                    $sql2=$con->prepare("SELECT nombre,apellido FROM estudiantes WHERE cedula='$idEstudiante'");
                    $sql2->execute();
                    $resultado2= $sql2->fetchAll(PDO::FETCH_ASSOC);
                    foreach($resultado2 as $row2){
                        $nombreC="".$row2["nombre"]." ".$row2["apellido"];
                    }
                    $sql2=$con->prepare("SELECT correo FROM profesores WHERE cedula='$idTutor'");
                    $sql2->execute();
                    $resultado2= $sql2->fetchAll(PDO::FETCH_ASSOC);
                    foreach($resultado2 as $row2){
                        $correo="".$row2["correo"];
                    }
                    $tipoC="Estudiante";
                }
                else if($cedula==$row["idTutor"]){
                    $sql2=$con->prepare("SELECT nombre,apellido FROM profesores WHERE cedula='$idTutor'");
                    $sql2->execute();
                    $resultado2= $sql2->fetchAll(PDO::FETCH_ASSOC);
                    foreach($resultado2 as $row2){
                        $nombreC="".$row2["nombre"]." ".$row2["apellido"];
                    }
                    $sql2=$con->prepare("SELECT correo FROM estudiantes WHERE cedula='$idEstudiante'");
                    $sql2->execute();
                    $resultado2= $sql2->fetchAll(PDO::FETCH_ASSOC);
                    foreach($resultado2 as $row2){
                        $correo="".$row2["correo"];
                    }
                    $tipoC="Tutor";
                }
            }
            
        }
        $sql= $con->prepare("DELETE FROM tutorias WHERE idTutoria=$idTutoria");
        $sql->execute();
    }


$to = $correo;
$subject = "TUTORIA CANCELADA";
$headers = 'From:soporte@tutorias-academicas.com'."\r\n" ;



$message = '
    

    El '.$tipoC.' '.$nombreC.' Cancelo la tutoria que estaba programada para la fecha '.$fecha.'.
    
    La motivo por el cual se cancelo la tutoria fue:

    '.$razon.'
    
    
    
    !Gracias!
    -------------------------

    



            ';

    
    mail($to, $subject, $message, $headers);
    echo json_encode("LA TUTORIA HA SIDO CANCELADA");
 

}catch(Exception $e){

    echo json_encode("Error en la base de datos.");

}   
?>