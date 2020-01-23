<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Projeto Final</title>
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" href="../styles/forms.css">
</head>

<?php
include_once 'dbconnect.php'; //inclui o servidor SQL
$sql = "SELECT id_propriedade, morada FROM propriedade where id_propriedade not in (SELECT id_propriedade from atividade)";
$resultadoPropriedade = $mysqli->query($sql);

$sql2 = "SELECT nome,id_cliente FROM cliente";
$resultadoCliente = $mysqli->query($sql2);
?>


<form action="adicionarProposta.php" method="POST">
    <label>Adicionar Proposta</label>
    </select><br><br>
    <label>Proposta:</label>
    <input type='number' id="proposta" name="proposta" /><br><br>
    <label>Propriedade:</label>
    <select  id="id_propriedade" name="id_propriedade">
        <option value="" selected>Selecione a propriedade</option>
        <?php
        while ($linha3 = $resultadoPropriedade->fetch_array()) {
        ?>
            <option value="<?php echo $linha3['id_propriedade'] ?>"> <?php echo $linha3['morada'] ?> </option>
        <?php
        }
        ?>
    </select><br><br>

        <label>Cliente:</label>
        <select  id="id_cliente" name="id_cliente">
            <option value="" selected>Selecione o cliente</option>
            <?php
            while ($linha4 = $resultadoCliente->fetch_array()) {
            ?>
                <option value="<?php echo $linha4['id_cliente'] ?>"> <?php echo $linha4['nome'] ?> </option>
            <?php
            }
            ?>
      </select><br><br>

    <label>Estado:</label>
    <select id="estado" name="estado">
    <option value="Aceite" selected>Aceite</option>
    <option value="Recusada" selected>Recusada</option>
  </select><br><br>

    <button type="submit">Adicionar</button>
</form>

</html>
