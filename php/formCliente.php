<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Projeto Final</title>
    <link rel="icon" href="../assets/main_logowhite.png">
    <link rel="stylesheet" type="text/css" href="../styles/forms.css">
</head>

<form action="adicionarCliente.php" method="POST">
    <label>Adicionar Cliente</label>
    <input type='text' id="nome" name="nome" placeholder="Nome" /><br><br>
    <input type='text' id="morada" name="morada" placeholder="Morada"/><br><br>
    <input type='number' id="nif" name="nif" placeholder="NIF" /><br><br>
    <input type='number' id="telefone" name="telefone" placeholder="Telefone" /><br><br>
    <input type='text' id="email" name="email" placeholder="Email" /><br><br>
    <button type="submit">Adicionar</button>
</form>

</html>
