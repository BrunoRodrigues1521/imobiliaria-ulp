<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Projeto Final</title>
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" href="../styles/forms.css">
    <script src="../scripts/limit.js"></script>
</head>

<?php
include_once 'dbconnect.php'; //inclui o servidor SQL
$sql = "SELECT id_proprietario, nome FROM proprietario";
$resultadoProprietario = $mysqli->query($sql);
?>

<form action="adicionarPropriedade.php" method="POST">
    <label>Adicionar Propriedade</label>
    <label>Proprietario:</label>
    <select  id="id_proprietario" name="id_proprietario">
        <option value="" selected>Selecione o proprietario</option>
        <?php
        while ($linha = $resultadoProprietario->fetch_array()) {
        ?>
            <option value="<?php echo $linha['id_proprietario'] ?>"> <?php echo $linha['nome'] ?> </option>
        <?php
        }
        ?>
    </select><br><br>
    <label>Morada:</label>
    <input type='text' id="morada" name="morada" /><br><br>
    <label>Código Postal:</label>
    <input id="codigoPostal1" type='int' name='codigoPostal1' maxlength="4" />-<input id="codigoPostal2" type='int' name='codigoPostal2' maxlength="4" /></td>
    <label>Tipologia:</label>
    <select id="tipologia" name="tipologia" placeholder="Selecione a Tipologia">
      <option value="Compra" selected>Compra</option>
      <option value="Arrendamento" selected>Arrendamento</option>
    </select>
    <label>Preço:</label>
    <input type='int' name="preco" maxlength="8"/><br><br>
    <button type="submit">Adicionar</button>
</form>

</html>
