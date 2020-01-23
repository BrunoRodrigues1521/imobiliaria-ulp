<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Projeto Final</title>
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" href="../styles/forms.css">

<form action="adicionarFuncionario.php" method="POST">
    <label>Adicionar Funcionario</label>
    <label>Nome:</label>
    <input type='text' id="nome" name="nome" /><br><br>
    <label>Idade:</label>
    <input type='number' id="idade" name="idade" /><br><br>
    <label>Nif:</label>
    <input type='number' id="nif" name="nif" /><br><br>
    <label>Morada:</label>
    <input type='text' id="morada" name="morada" /><br><br>
    <label>Telefone:</label>
    <input type='number' id="telefone" name="telefone" /><br><br>
    <label>Email:</label>
    <input type='text' id="email" name="email" /><br><br>
    <label>Tipo de Contrato:</label>
    <select id="tipocontrato" name="tipocontrato" placeholder="Selecione o tipo de contrato">
      <option value="Definitivo" selected>Definitivo</option>
      <option value="À Experiência" selected>À Experienca</option>
    </select>
    </select><br><br>
    <button type="submit">Adicionar</button>
</form>

</html>
