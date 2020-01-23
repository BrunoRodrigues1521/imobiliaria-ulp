<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Projeto Final</title>
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" type="text/css" href="../styles/forms.css">
</head>

<form action="adicionarFiador.php" method="POST">
    <label>Adicionar Fiador</label>
    <label>Nome:</label>
    <input type='text' id="nome" name="nome" /><br><br>
    <label>Email:</label>
    <input type='text' id="email" name="email" /><br><br>
    <label>NIF:</label>
    <input type='number' id="nif" name="nif" /><br><br>
    <label>Morada:</label>
    <input type='text' id="morada" name="morada" /><br><br>
    <label>Telefone:</label>
    <input type='number' id="telefone" name="telefone" /><br><br>
    <button type="submit">Adicionar</button>
</form>

</html>
