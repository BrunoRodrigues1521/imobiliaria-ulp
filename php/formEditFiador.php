<!DOCTYPE html>
<html>

    <head>
        <meta charset="ISO-8859-1">
        <link rel="icon" href="../assets/main_logowhite.png">
        <link rel="stylesheet" href="../styles/forms.css">
    </head>
    <body>
        <?php
            include_once 'dbconnect.php'; //inclui o servidor SQL';

            $id_fiador = $_GET["id_fiador"];
            $sql = "SELECT * FROM fiador WHERE id_fiador =".$id_fiador; //"fiador" é o nome da tabela a ser utilizada
            $resultado = $mysqli -> query($sql); //coloca no objeto "resultado" a query do objeto "ligação"

            $linha = $resultado -> fetch_assoc(); //Obtem a linha do fiador a editar
        ?>

        <!-- Formulario para editar o fiador -->
        <form action="editarFiador.php" method="post">
        <label>Editar Fiador</label>
        <label>Nome: </label>
        <input id="nome" name="nome" value="<?php echo $linha["nome"] ?>"><br>
        <label>Nif: </label>
        <input id="nif" name="nif" value="<?php echo $linha["nif"] ?>"><br>
        <label>Morada: </label>
        <input id="morada" name="morada" value="<?php echo $linha["morada"] ?>"><br>
        <label>Email: </label>
        <input id="email" name="email" value = "<?php echo $linha["email"] ?>"><br>
        <label>Telefone: </label>
        <input id="telefone" name="telefone" value="<?php echo $linha["telefone"] ?>"><br>
        <input type="hidden" id="id_fiador" name="id_fiador" value="<?php echo $id_fiador?>">
        <input type="submit">
    </body>
</html>
