<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Projeto Final</title>
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" href="../styles/forms.css">
</head>

<form action="adicionarProprietario.php" method="POST">
    <label>Adicionar Proprietario</label>
    <label>Nome:</label>
    <input type='text' id="nome" name="nome" placeholder="Nome" /><br><br>
    <label>Morada:</label>
    <input type='text' id="morada" name="morada" placeholder="Morada"/><br><br>
    <label>NIF:</label>
    <input type='number' id="nif" name="nif" placeholder="NIF" /><br><br>
    <label>Telefone:</label>
    <input type='number' id="telefone" name="telefone" placeholder="Telefone" /><br><br>
    <label>Email:</label>
    <input type='text' id="email" name="email" placeholder="Email" /><br><br>
    <button type="submit">Adicionar</button>
</form>

</html>
