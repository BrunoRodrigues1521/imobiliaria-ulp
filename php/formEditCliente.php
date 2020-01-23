<html>

    <head>
        <meta charset="ISO-8859-1">
        <link rel="icon" href="../assets/main_logowhite.png">
        <link rel="stylesheet" href="../styles/forms.css">
    </head>
    <body>
        <?php
            include_once 'dbconnect.php'; //inclui o servidor SQL';

            $id_cliente = $_GET["id_cliente"];
            $sql = "SELECT * FROM cliente WHERE id_cliente =".$id_cliente; //"cliente" é o nome da tabela a ser utilizada
            $resultado = $mysqli -> query($sql); //coloca no objeto "resultado" a query do objeto "ligação"

            $linha = $resultado -> fetch_assoc(); //Obtem a linha do cliente a editar
        ?>

        <!-- Formulario para editar o cliente -->
        <form action="editarCliente.php" method="post">
        <label>Editar Cliente</label>
        <label>Nome: </label>
        <input id="nome" name="nome" value="<?php echo $linha["nome"] ?>"><br>
        <label>Morada: </label>
        <input id="morada" name="morada" value = "<?php echo $linha["morada"] ?>"><br>
        <label>NIF: </label>
        <input id="nif" name="nif" value="<?php echo $linha["nif"] ?>"><br>
        <label>Telefone: </label>
        <input id="telefone" name="telefone" value="<?php echo $linha["telefone"] ?>"><br>
        <label>Telefone: </label>
        <input id="email" name="email" value="<?php echo $linha["email"] ?>"><br>
        <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente?>">
        <input type="submit">
    </body>
</html>
