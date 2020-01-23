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

            $id_funcionario = $_GET["id_funcionario"];
            $sql = "SELECT * FROM funcionarios WHERE id_funcionario =".$id_funcionario; //"funcionario" é o nome da tabela a ser utilizada
            $resultado = $mysqli -> query($sql); //coloca no objeto "resultado" a query do objeto "ligação"

            $linha = $resultado -> fetch_assoc(); //Obtem a linha do funcionario a editar
        ?>

        <!-- Formulario para editar o funcionario -->
        <form action="editarFuncionario.php" method="post">
        <label>Editar funcionario</label>
        <label>Nome: </label>
        <input id="nome" name="nome" value="<?php echo $linha["nome"] ?>"><br>
        <label>Idade: </label>
        <input id="idade" name="idade" value = "<?php echo $linha["idade"] ?>"><br>
        <label>Nif: </label>
        <input id="nif" name="nif" value="<?php echo $linha["nif"] ?>"><br>
        <label>Morada: </label>
        <input id="morada" name="morada" value="<?php echo $linha["morada"] ?>"><br>
        <label>Telefone: </label>
        <input id="telefone" name="telefone" value="<?php echo $linha["telefone"] ?>"><br>
        <label>Email: </label>
        <input id="email" name="email" value="<?php echo $linha["email"] ?>"><br>
        <label>Tipo de Contrato:</label>
        <select id="tipocontrato" name="tipocontrato" value="<?php echo $linha["tipocontrato"]?>">
          <option value="Definitivo" selected>Definitivo</option>
          <option value="À Experiência" selected>À Experienca</option>
        </select><br>
        <input type="hidden" id="id_funcionario" name="id_funcionario" value="<?php echo $id_funcionario?>">
        <input type="submit">
    </body>
</html>
