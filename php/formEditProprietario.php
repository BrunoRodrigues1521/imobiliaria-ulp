<html>
    <head>
        <meta charset="ISO-8859-1">
        <link rel="icon" href="../assets/main_logowhite.png">
        <link rel="stylesheet" href="../styles/forms.css">
    </head>
    <body>
        <?php
            include_once 'dbconnect.php'; //inclui o servidor SQL';

            $id_proprietario = $_GET["id_proprietario"];
            $sql = "SELECT * FROM proprietario WHERE id_proprietario =".$id_proprietario; //"proprietario" é o nome da tabela a ser utilizada
            $resultado = $mysqli -> query($sql); //coloca no objeto "resultado" a query do objeto "ligação"

            $linha = $resultado -> fetch_assoc(); //Obtem a linha do proprietario a editar
        ?>

        <!-- Formulario para editar o proprietario -->
        <form action="editarProprietario.php" method="post">
        <label>Editar proprietario</label>
        <label>Nome: </label>
        <input id="nome" name="nome" value="<?php echo $linha["nome"] ?>"><br>
        <label>Morada: </label>
        <input id="morada" name="morada" value = "<?php echo $linha["morada"] ?>"><br>
        <label>NIF: </label>
        <input id="nif" name="nif" value="<?php echo $linha["nif"] ?>"><br>
        <label>Telefone: </label>
        <input id="telefone" name="telefone" value="<?php echo $linha["telefone"] ?>"><br>
        <label>Email: </label>
        <input id="email" name="email" value="<?php echo $linha["email"] ?>"><br>
        <input type="hidden" id="id_proprietario" name="id_proprietario" value="<?php echo $id_proprietario?>">
        <input type="submit">
    </body>
</html>
