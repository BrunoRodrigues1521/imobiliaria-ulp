<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Projeto Final</title>
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" type="text/css" href="../styles/forms.css">
</head>

<?php
include_once 'dbconnect.php'; //inclui o servidor SQL
$sql = "SELECT id_propriedade, morada FROM propriedade where id_propriedade not in (SELECT id_propriedade from atividade)";
$resultadoPropriedade = $mysqli->query($sql);

$sql2 = "SELECT nome,id_funcionario FROM funcionarios";
$resultadoNome = $mysqli->query($sql2);

$sql3 = "SELECT nome,id_cliente FROM cliente";
$resultadoCliente = $mysqli->query($sql3);

$sql4 = "SELECT nome,id_fiador FROM fiador";
$resultadoFiador = $mysqli->query($sql4);

?>


<form action="adicionarAtividade.php" method="POST">
    <label>Adicionar Propriedade</label>
    </select><br><br>
    <label>Nome:</label>
    <select  id="id_funcionario" name="id_funcionario">
        <option value="" selected>Selecione o funcionário</option>
        <?php
        while ($linha2 = $resultadoNome->fetch_array()) {
        ?>
            <option value="<?php echo $linha2['id_funcionario'] ?>"> <?php echo $linha2['nome'] ?> </option>
        <?php
        }
        ?>
    </select><br><br>

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

            <label>Fiador:</label>
            <select  id="id_fiador" name="id_fiador">
                <option value="NULL" selected>Selecione o fiador</option>
                <option value="NULL">Nenhum</option>

                <?php
                while ($linha5 = $resultadoFiador->fetch_array()) {
                ?>
                    <option value="<?php echo $linha5['id_fiador'] ?>"> <?php echo $linha5['nome'] ?> </option>
                <?php
                }
                ?>
    </select><br><br>
    <label>Preco:</label>
    <input type='number' id="preco" name="preco" /><br><br>

    <label>Comissão:</label>
    <input type='number' id="comissao" name="comissao" /><br><br>
    <button type="submit">Adicionar</button>
</form>

</html>
