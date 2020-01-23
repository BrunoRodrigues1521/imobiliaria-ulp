<?php
    include_once 'dbconnect.php'; //inclui o servidor SQL

    //Recebe os dados do formulário por método POST
    $novoProprietario=$_POST["id_proprietario"];
    $novaMorada = $_POST["morada"];
    $novoCodigoPostal = $_POST["codigoPostal"];
    $novaTipologia = $_POST["tipologia"];
    $novoPreco = $_POST["preco"];
    $id_propriedade = $_POST["id_propriedade"];

    //Editar a propriedade na Base de Dados
    $sql = "UPDATE propriedade SET id_proprietario='$novoProprietario',tipologia = '$novaTipologia', morada = '$novaMorada', codigoPostal = '$novoCodigoPostal', preco = '$novoPreco' WHERE id_propriedade ='$id_propriedade'";
    $preparar = $mysqli->prepare($sql);
    if(!$preparar){
        echo "Prepare failed: (". $mysqli->errno.") ".$mysqli->error."<br>"; //Notifica em caso de erro na preparação da query
     }else{
        $preparar->execute(); //Executa a query
        header("Location: propriedades.php");
     }

?>
