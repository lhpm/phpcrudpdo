<?php
try{
    // Conexión BASE DE DATOS A MYSQL
    $pdo = new PDO('mysql:host=localhost;dbname=pdo', 'root', '');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Obtener resultados
    $sql = $pdo->prepare('SELECT * FROM clientes');
    $sql->execute(array('Email' => 'correo@correo.com'));
    $resultado = $sql->fetchAll();
 
    var_dump($resultado[0]);
 
    // Obtener los resultados de la base de datos
    $sql = $pdo->prepare('SELECT * FROM clientes');
    $sql->execute();
    $resultado = $sql->fetchAll();

    ?>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Editar</th>
            <th>Borrar</th>
        </thead>
        <tbody><tr>
            <?php
 
    // Mostrar array de los resultados
    foreach ($resultado as $row) {

        print '<td>';
        echo $row["nombre"];
        print '</td>';
        print '<td>';
        echo $row["telefono"];
        print '</td>';
        print '<td>';
        print '<a href="editar.php?id='.$row["id"].'">Editar</a>';
        print '</td>';
        print '<td>';
        print '<a href="borrar.php?id='.$row["id"].'"">Borrar</a>';
        print '</td>';
    }
    print '</tr></tbody>';
    print '</table>';
 
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>