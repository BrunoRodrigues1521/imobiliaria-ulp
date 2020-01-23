<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL

    //Recebe os dados do formulário por método POST
    $nome = $_POST["nome"];
    $morada = $_POST["morada"];
    $nif = $_POST["nif"];
    $telefone = $_POST["telefone"];
    $email= $_POST["email"];

    //Adicionar o cliente na Base de Dados
    $sql = "INSERT INTO proprietario (nome, morada, nif,telefone,email) VALUES ('$nome', '$morada', '$nif','$telefone','$email')";
    $preparar = $mysqli->prepare($sql);
    if(!$preparar){
        echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>"; //Notifica em caso de erro na preparação da query
     }else{
        $preparar->execute(); //Executa a query
        header("Location: clientes.php");
     }

?>
