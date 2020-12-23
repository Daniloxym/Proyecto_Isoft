<?php
    session_start();

    if(isset($_POST["tipo"])){
        if($_POST["tipo"]=="pedirDatos"){
            if(isset($_SESSION["nombre"])){
            $res["tipoLogin"]=$_SESSION["tipoLogin"];
            $res["foto"]=$_SESSION["foto"];
            $res["nombre"]=$_SESSION["nombre"];
            $res["apellido"]=$_SESSION["apellido"];
            $res["cedula"]=$_SESSION["cedula"];
            echo json_encode($res);
            }
            else{
            $res["nombre"]=null;
            echo json_encode($res);
            }
            
        }
    }else{
        $conn = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $correo= strtoupper($_POST["correo"]);
    $pass= $_POST["pass"];
    $tipoLogin=$_POST["tipoLogin"];
    if($tipoLogin=="Estudiante"){
        $sql= $conn->prepare("SELECT nombre,apellido,cedula,pasword,activo,foto FROM estudiantes WHERE correo='$correo'");
    
    }
    else if($tipoLogin=="Profesor"){
        $sql= $conn->prepare("SELECT nombre,apellido,cedula,pasword,activo,foto FROM profesores WHERE correo='$correo'");
    
    }
    $sql->execute();
    $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    
 
    foreach ($resultado as $row) {
        
        
        $res['nombre'] =$row['nombre'];
        $res['apellido'] =$row['apellido'];
        $res['cedula'] =$row['cedula'];
        $res['foto']= "".base64_encode($row['foto']);
        $hash =$row['pasword'];
        $activo=$row['activo'];
        
    }
    
    if(password_verify($pass,$hash) && $activo==1){
    $_SESSION["tipoLogin"]=$tipoLogin;
    $_SESSION["cedula"]=$res['cedula'];
    $_SESSION["nombre"]=$res["nombre"];
    $_SESSION["apellido"]=$res["apellido"];
    $_SESSION["foto"]=$res["foto"];
    
    
    echo json_encode($res);
    
        
    }
    
    else{
        
        echo json_encode(0/0);
    }
    }
    
    
?>