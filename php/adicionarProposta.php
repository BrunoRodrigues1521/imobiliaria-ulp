<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL

    //Recebe os dados do formulário por método POST
    $proposta = $_POST["proposta"];
    $propriedade = $_POST["id_propriedade"];
    $cliente= $_POST["id_cliente"];
    $estado=$_POST["estado"];

    //Adicionar a propriedade na Base de Dados
    $sql = "INSERT INTO proposta (proposta, id_propriedade,id_cliente,estado) VALUES ( '$proposta', '$propriedade','$cliente','$estado')";
    $preparar = $mysqli->prepare($sql);
    if(!$preparar){
        echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>"; //Notifica em caso de erro na preparação da query
     }else{
        $preparar->execute(); //Executa a query
        header("Location: financeira.php");
     }

?>
