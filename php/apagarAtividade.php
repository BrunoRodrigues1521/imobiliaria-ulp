<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL;

    //Obter id da propriedade por metodo GET
    $id_atividade = $_GET["id_atividade"];

    //Apagar propriedade diretamente da base de dados
    $sql = "DELETE FROM atividade WHERE id_atividade = '$id_atividade'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: financeira.php");
?>
