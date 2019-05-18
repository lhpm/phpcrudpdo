<?php
try{
        // Conexión a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=pdo', 'root', '');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Sacar un resultado
    $sql = $pdo->prepare('SELECT * FROM clientes');
    $sql->execute(array('id' => '1'));
    $resultado = $sql->fetchAll();
 
    var_dump($resultado[0]);

    // Sacar todos los resultados de la base de datos
    $sql = $pdo->prepare('SELECT * FROM clientes WHERE id='.$_GET['id'].' ');
    $sql->execute();
    $resultado = $sql->fetchAll();

    ?>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Telefono</th>
        </thead>
        <tbody><tr>
            <form action="editado.php" method="POST">
            <?php
 
        // Mostrar resultados
    foreach ($resultado as $row) {

        print '<input name="id" type="text" value="'.$row["id"].'" readonly>';

        print '<td>';
        print '<input name="nombre" type="text" value="'.$row["nombre"].'">';
        print '</td>';
        print '<td>';
        print '<input name="telefono" type="text" value="'.$row["telefono"].'">';
        print '</td>';
    }
    print '<button type="submit">Guardar</button>';
    print '</form></tr></tbody>';
    print '</table>';

}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>