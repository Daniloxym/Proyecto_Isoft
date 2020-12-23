<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=tutori12_Tutorias', "tutori12_Danilo", "tutorias");
    
    $sql= "SELECT nombre,codigoC FROM carreras";
    
    $stm= $conn->prepare($sql);
    $stm->execute();
    $resultado= $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
}
catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}