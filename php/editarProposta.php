<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL';

    //Buscar a informacao do formulario por metodo POST
    $novoProposta = $_POST["proposta"];
    $novaPropriedade = $_POST["id_propriedade"];
    $novoCliente = $_POST["id_cliente"];
    $novoEstado = $_POST["estado"];
    $id_proposta =  $_POST["id_proposta"];


    //Update (editar) o aluno na Base de Dados
    $sql = "UPDATE proposta SET proposta = '$novoProposta', id_propriedade = '$novaPropriedade', id_cliente = '$novoCliente',estado='$novoEstado' WHERE id_proposta = '$id_proposta'";
    $preparar = $mysqli->prepare($sql);
    $preparar->execute();
    header("Location: financeira.php");
?>
