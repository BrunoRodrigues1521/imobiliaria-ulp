<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL

    //Recebe os dados do formulário por método POST
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $nif=$_POST["nif"];
    $morada = $_POST["morada"];


    //Adicionar o fiador na Base de Dados
    $sql = "INSERT INTO fiador (nome,nif,morada,email, telefone) VALUES ('$nome','$nif','$morada', '$email', '$telefone')";
    $preparar = $mysqli->prepare($sql);
    if(!$preparar){
        echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>"; //Notifica em caso de erro na preparação da query
     }else{
        $preparar->execute(); //Executa a query
        header("Location: clientes.php");
     }

?>
