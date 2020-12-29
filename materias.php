<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    $sql= "SELECT * FROM materias";
    
    $stm= $conn->prepare($sql);
    $stm->execute();
    $resultado= $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
}
catch(PDOException $e){
    echo json_encode(null);
}