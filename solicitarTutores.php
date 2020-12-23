<?php
session_start();
    $conn = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $codigo= $_POST["codigoM"];
    $sql= $conn->prepare("SELECT nombre FROM materias WHERE codigo=$codigo");
    $sql->execute();
    $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $row) {
        $res2 =$row['nombre'];
    }

    
    $_SESSION["nombreM"]=$res2;
    echo json_encode($_SESSION["nombreM"]);
    
?>