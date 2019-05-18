<?php

    $pdo = new PDO('mysql:host=localhost;dbname=pdo', 'root', '');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "DELETE FROM clientes WHERE id =  :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);   
$stmt->execute();

?>