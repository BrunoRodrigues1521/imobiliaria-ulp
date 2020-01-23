<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL

    //Recebe os dados do formulário por método POST
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $nif = $_POST["nif"];
    $telefone=$_POST["telefone"];
    $morada=$_POST["morada"];
    $email=$_POST["email"];
    $tipocontrato = $_POST["tipocontrato"];

    //Adicionar a propriedade na Base de Dados
    $sql = "INSERT INTO funcionarios (nome, idade, nif,morada,telefone,email ,tipocontrato) VALUES ('$nome', '$idade', '$nif','$morada','$telefone' ,'$email','$tipocontrato')";
    $preparar = $mysqli->prepare($sql);
    if(!$preparar){
        echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>"; //Notifica em caso de erro na preparação da query
     }else{
        $preparar->execute(); //Executa a query
        header("Location: funcionarios.php");
     }

?>
