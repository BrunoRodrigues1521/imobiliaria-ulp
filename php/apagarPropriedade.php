<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL;

    //Obter id da propriedade por metodo GET
    $id_propriedade = $_GET["id_propriedade"];

    //Apagar propriedade diretamente da base de dados
    $sql = "DELETE FROM propriedade WHERE id_propriedade = '$id_propriedade'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: propriedades.php");
?>
