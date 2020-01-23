<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL;

    //Obter id do aluno por metodo GET
    $id_proprietario = $_GET["id_proprietario"];

    //Apagar aluno diretamente da base de dados
    $sql = "DELETE FROM proprietario WHERE id_proprietario = '$id_proprietario'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: clientes.php");
?>
