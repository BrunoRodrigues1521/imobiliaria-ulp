<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL;

    //Obter id da propriedade por metodo GET
    $id_funcionario = $_GET["id_funcionario"];

    //Apagar propriedade diretamente da base de dados
    $sql = "DELETE FROM funcionarios WHERE id_funcionario = '$id_funcionario'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: funcionarios.php");
?>
