<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL';

    //Buscar a informacao do formulario por metodo POST
    $novoNome = $_POST["nome"];
    $novaMorada = $_POST["morada"];
    $novoNIF = $_POST["nif"];
    $novoTelefone = $_POST["telefone"];
    $novoEmail = $_POST["email"];
    $id_cliente =  $_POST["id_cliente"];

    //Update (editar) o aluno na Base de Dados
    $sql = "UPDATE cliente SET nome = '$novoNome', morada = '$novaMorada', nif = '$novoNIF',telefone='$novoTelefone',email='$novoEmail' WHERE id_cliente = '$id_cliente'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: clientes.php");
?>
