<?php

    $pdo = new PDO('mysql:host=localhost;dbname=pdo', 'root', '');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE clientes SET nombre = :nombre, telefono = :telefono
            WHERE id = :id ";
$stmt = $pdo->prepare($sql);                                  
$stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);       
$stmt->bindParam(':telefono', $_POST['$telefono'], PDO::PARAM_STR);    
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
$stmt->execute();

?>