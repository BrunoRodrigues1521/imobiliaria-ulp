<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL;

    //Obter id do aluno por metodo GET
    $id_fiador = $_GET["id_fiador"];

    //Apagar aluno diretamente da base de dados
    $sql = "DELETE FROM fiador WHERE id_fiador = '$id_fiador'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: clientes.php");
?>
