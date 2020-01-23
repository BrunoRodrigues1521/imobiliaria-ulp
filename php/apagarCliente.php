<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL;

    //Obter id do aluno por metodo GET
    $id_cliente = $_GET["id_cliente"];

    //Apagar aluno diretamente da base de dados
    $sql = "DELETE FROM cliente WHERE id_cliente = '$id_cliente'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: clientes.php");
?>
