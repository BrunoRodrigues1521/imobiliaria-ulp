<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL;

    //Obter id do aluno por metodo GET
    $id_proposta = $_GET["id_proposta"];

    //Apagar aluno diretamente da base de dados
    $sql = "DELETE FROM proposta WHERE id_proposta = '$id_proposta'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: financeira.php");
?>
