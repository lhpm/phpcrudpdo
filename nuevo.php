<?php


    $pdo = new PDO('mysql:host=localhost;dbname=pdo', 'root', '');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO clientes(nombre,
            telefono) VALUES (
            :nombre, 
            :telefono)";
                                          
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);       
$stmt->bindParam(':telefono', $_POST['telefono'], PDO::PARAM_STR); 
                                     
$stmt->execute();

?>