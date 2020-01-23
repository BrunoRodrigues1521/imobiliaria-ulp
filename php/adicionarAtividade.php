<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL

    //Recebe os dados do formulário por método POST
    $nome = $_POST["id_funcionario"];
    $propriedade = $_POST["id_propriedade"];
    $preco = $_POST["preco"];
    $cliente= $_POST["id_cliente"];
    $fiador= $_POST["id_fiador"];
    $comissao= $_POST["comissao"];

    //Adicionar a propriedade na Base de Dados
    if($fiador!=="NULL"){
    $sql = "INSERT INTO atividade (id_funcionario, id_propriedade,id_cliente,id_fiador,preco,comissao) VALUES ( '$nome', '$propriedade','$cliente','$fiador','$preco','$comissao')";
  }else{
    $sql = "INSERT INTO atividade (id_funcionario, id_propriedade,id_cliente,id_fiador,preco,comissao) VALUES ( '$nome', '$propriedade','$cliente',$fiador,'$preco','$comissao')";
  }
    $preparar = $mysqli->prepare($sql);
    if(!$preparar){
        echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>"; //Notifica em caso de erro na preparação da query
     }else{
        $preparar->execute(); //Executa a query
        header("Location: funcionarios.php");
     }

?>
