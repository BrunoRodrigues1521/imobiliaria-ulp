<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL';

    //Buscar a informacao do formulario por metodo POST
    $novoNome = $_POST["nome"];
    $novoEmail = $_POST["email"];
    $novoNif = $_POST["nif"];
    $novoTelefone = $_POST["telefone"];
    $novoMorada = $_POST["morada"];
    $id_fiador =  $_POST["id_fiador"];

    //Update (editar) o aluno na Base de Dados
    $sql = "UPDATE fiador SET nome = '$novoNome',nif= '$novoNif' ,morada='$novoMorada',email = '$novoEmail', telefone = '$novoTelefone' WHERE id_fiador = '$id_fiador'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: clientes.php");
?>
