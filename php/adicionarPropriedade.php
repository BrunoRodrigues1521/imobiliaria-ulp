<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL

    //Recebe os dados do formulário por método POST
    $morada = $_POST["morada"];
    $codigoPostal = $_POST["codigoPostal1"]."-".$_POST["codigoPostal2"];
    $tipologia = $_POST["tipologia"];
    $preco = $_POST["preco"];
    $proprietario= $_POST["id_proprietario"];

    //Adicionar a propriedade na Base de Dados
    $sql = "INSERT INTO propriedade (id_proprietario,tipologia, morada, codigoPostal, preco) VALUES ('$proprietario','$tipologia', '$morada', '$codigoPostal', '$preco')";
    $preparar = $mysqli->prepare($sql);
    if(!$preparar){
        echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>"; //Notifica em caso de erro na preparação da query
     }else{
        $preparar->execute(); //Executa a query
        header("Location: propriedades.php");
     }

?>
