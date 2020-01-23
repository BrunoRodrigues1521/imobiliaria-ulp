<?php
    include_once 'dbconnect.php';

    //Obter id do aluno por metodo GET
    $id_auth = $_GET["id_auth"];

    //Apagar aluno diretamente da base de dados
    $sql = "DELETE FROM acessos WHERE id_auth = '$id_auth'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: acessos.php");


?>
