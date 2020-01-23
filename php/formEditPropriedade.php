<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" href="../styles/forms.css">
</head>

<body>
    <?php
    include_once 'dbconnect.php'; //inclui o servidor SQL';

    $id_propriedade = $_GET["id_propriedade"];
    $sql = "SELECT * FROM propriedade WHERE id_propriedade =" . $id_propriedade; //"propriedade" é o nome da tabela a ser utilizada
    $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"

    $linha = $resultado->fetch_assoc(); //Obtem a linha do propriedade a editar

    //Formulario para editar o propriedade
    $sql = "SELECT id_proprietario, nome FROM proprietario";
    $resultadoProprietario = $mysqli->query($sql);
    ?>

    <form action="editarPropriedade.php" method="POST">
        <label>Editar Proriedade</label>
          <label>Proprietario:</label>
          <select id="id_proprietario" name="id_proprietario">
              <?php
              $sql = "SELECT nome FROM proprietario WHERE id_proprietario =" . $linha['id_proprietario'];
              $resultadoProprietarioAtual = $mysqli->query($sql);
              $proprietarioAtual = $resultadoProprietarioAtual->fetch_assoc();
              ?>
              <option value="<?php echo $linha['id_proprietario'] ?>" selected><?php echo $proprietarioAtual['nome'] ?></option>
              <?php

              while ($linha2 = $resultadoProprietario->fetch_array()) {

                  if ($linha2['id_proprietario'] != $linha['id_proprietario']) {
              ?>
                      <option value="<?php echo $linh2a['id_proprietario'] ?>"> <?php echo $linha2['nome'] ?> </option>
              <?php
                  }
              }
              ?>
          </select><br><br>
        <label>Morada:</label>
        <input type='text' id="morada" name="morada" value="<?php echo $linha['morada'] ?>" /><br><br>
        <label>Código Postal:</label>
        <input type='text' id="codigoPostal" name="codigoPostal" value="<?php echo $linha['codigoPostal'] ?>" /><br><br>
        <label>Preço:</label>
        <input type='text' id="preco" name="preco" value="<?php echo $linha['preco'] ?>" /><br><br>
        <label>Tipologia:</label>
        <select id="tipologia" name="tipologia" placeholder="Selecione a Tipologia">
          <option value="Compra" selected>Compra</option>
          <option value="Arrendamento" selected>Arrendamento</option>
        </select><br><br>
        <input type="hidden" id="id_propriedade" name="id_propriedade" value="<?php echo $id_propriedade?>">
        <button type="submit">Adicionar</button>
    </form>
</body>

</html>
