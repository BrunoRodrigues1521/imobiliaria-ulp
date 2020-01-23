<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL';

    //Buscar a informacao do formulario por metodo POST
    $novoNome = $_POST["nome"];
    $novoIdade = $_POST["idade"];
    $novoNif = $_POST["nif"];
    $novoTelefone = $_POST["telefone"];
    $novoMorada= $_POST["morada"];
    $novoEmail= $_POST["email"];
    $novoTipoContrato = $_POST["tipocontrato"];
    $id_funcionario =  $_POST["id_funcionario"];

    //Update (editar) o aluno na Base de Dados
    $sql = "UPDATE funcionarios SET nome = '$novoNome', idade = '$novoIdade',nif='$novoNif' ,telefone = '$novoTelefone',email='$novoEmail' ,morada='$novoMorada',tipocontrato='$novoTipoContrato' WHERE id_funcionario = '$id_funcionario'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: funcionarios.php");
?>
