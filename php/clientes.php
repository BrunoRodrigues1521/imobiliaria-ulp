<?php
session_start();
if(empty($_SESSION['uId'])){
  header("Location:index.php");
}

if($_SESSION['role']=="workersmng"){
  header("Location:warningpage.php?error=permdenied");
}

$timeout = 3600;

if(isset($_SESSION['timeout'])) {

    $duracao = time() - (int)$_SESSION['timeout'];
    if($duracao > $timeout) {
        session_destroy();
        session_start();
        header("Location:index.php?error=sessionexpired");
    }
}
$_SESSION['timeout'] = time();

 ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Imobiliaria</title>
  <link rel="stylesheet" href="../styles/stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/jquery.jqpagination.js"></script>
  <script src="../scripts/filtrar.js"></script>

</head>
<header>
<?php include 'header.php' ?>
</header>
  <body>
        <section class="propriedades-table1">
          <h1>Area de Clientes</h1>
            <div class="grid-item">
              <div class="table" align="center">
                <h3>Clientes</h3>
                <input type="text" id="userinput" placeholder="Procurar">
                <?php
                include_once 'dbconnect.php'; //inclui o servidor SQL
                $sql = "SELECT * FROM cliente"; //"cliente" e' o nome da tabela a ser utilizada
                $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligacao"
                ?>
                <input type="button" class="addbutton" value="Adicionar cliente" onclick="location='formCliente.php'" />
                <?php
                if ($resultado->num_rows > 0) { //verificar se existem linhas
                ?>
                    <!-- Tabela com a lista de 2 -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Morada</th>
                                <th>NIF</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <?php
                        while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                        ?>
                          <tbody id="table">
                            <tr>
                                <!-- Imprime os 2 na tabela -->
                                <td><?php echo $linha["nome"] ?></td>
                                <td><?php echo $linha["morada"] ?></td>
                                <td><?php echo $linha["nif"] ?></td>
                                <td><?php echo $linha["telefone"] ?></td>
                                <td><?php echo $linha["email"] ?></td>
                                <td><?php echo $linha["data"] ?></td>
                                <td>
                                    <a href="formEditCliente.php?id_cliente=<?php echo $linha["id_cliente"] ?>&acao=editar">
                                        <img src="../assets/update.png" width="25" height="25" title="Editar o cliente"></a>
                                    <a href="apagarCliente.php?id_cliente=<?php echo $linha["id_cliente"] ?>&acao=apagar">
                                        <img src="../assets/remove.png" onclick="return confirm('Tem a certeza que deseja apagar? Lembre-se que só podera apagar individuos que nao estejam envolvidos em atividades')" width="25" height="25" title="Apagar o cliente"></a>
                                </td>
                            </tr>
                          </tbody>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                }
                ?>
            </div>
          </div>
            <div class="grid-item">

                          <div class="table" align ="center">
                            <h3>Fiadores</h3>
                            <input type="text" id="userinput2" placeholder="Procurar">
                            <?php
                            include_once 'dbconnect.php'; //inclui o servidor SQL
                            $sql = "SELECT * FROM fiador"; //"fiador" e' o nome da tabela a ser utilizada
                            $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"
                            ?>
                            <input type="button" class="addbutton" value="Adicionar fiador" onclick="location='formFiador.php'" />
                            <?php
                            if ($resultado->num_rows > 0) { //verificar se existem linhas
                            ?>

                                <!-- Tabela com a lista de fiadores -->
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>NIF</th>
                                            <th>Morada</th>
                                            <th>Telefone</th>
                                            <th>Data</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                                    ?>
                                      <tbody id="table2">
                                        <tr>
                                            <!-- Imprime os fiadores na tabela -->
                                            <td><?php echo $linha["nome"] ?></td>
                                            <td><?php echo $linha["email"] ?></td>
                                            <td><?php echo $linha["nif"] ?></td>
                                            <td><?php echo $linha["morada"] ?></td>
                                            <td><?php echo $linha["telefone"] ?></td>
                                            <td><?php echo $linha["data"] ?></td>
                                            <td>
                                                <a href="formEditFiador.php?id_fiador=<?php echo $linha["id_fiador"] ?>&acao=editar">
                                                    <img src="../assets/update.png" width="25" height="25" title="Editar o fiador"></a>
                                                <a href="apagarFiador.php?id_fiador=<?php echo $linha["id_fiador"] ?>&acao=apagar">
                                                    <img src="../assets/remove.png" onclick="return confirm('Tem a certeza que deseja apagar? Lembre-se que só podera apagar individuos que nao estejam envolvidos em atividades')" width="25" height="25" title="Apagar o fiador"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            <?php
                            }

                            ?>

            </div>
          </div>
          <div class="grid-item">

                        <div class="table" align ="center">
                          <h3>Proprietarios</h3>
                          <input type="text" id="userinput3" placeholder="Procurar">
                          <?php
                          include_once 'dbconnect.php'; //inclui o servidor SQL
                          $sql = "SELECT * FROM proprietario"; //"fiador" e' o nome da tabela a ser utilizada
                          $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"
                          ?>
                          <input type="button" class="addbutton" value="Adicionar Proprietario" onclick="location='formProprietario.php'" />
                          <?php
                          if ($resultado->num_rows > 0) { //verificar se existem linhas
                          ?>

                              <!-- Tabela com a lista de fiadores -->
                              <table class="table" >
                                  <thead>
                                      <tr>
                                          <th>Nome</th>
                                          <th>Morada</th>
                                          <th>NIF</th>
                                          <th>Telefone</th>
                                          <th>Email</th>
                                          <th>Ações</th>

                                      </tr>
                                  </thead>
                                  <?php
                                  while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                                  ?>
                                    <tbody id="table3">
                                      <tr>
                                          <!-- Imprime os fiadores na tabela -->
                                          <td><?php echo $linha["nome"] ?></td>
                                          <td><?php echo $linha["morada"] ?></td>
                                          <td><?php echo $linha["nif"] ?></td>
                                          <td><?php echo $linha["telefone"] ?></td>
                                          <td><?php echo $linha["email"] ?></td>
                                          <td>
                                              <a href="formEditProprietario.php?id_proprietario=<?php echo $linha["id_proprietario"] ?>&acao=editar">
                                                  <img src="../assets/update.png" width="25" height="25" title="Editar o proprietario"></a>
                                              <a href="apagarProprietario.php?id_proprietario=<?php echo $linha["id_proprietario"] ?>&acao=apagar">
                                                  <img src="../assets/remove.png" onclick="return confirm('Tem a certeza que deseja apagar? Lembre-se que só podera apagar individuos que nao estejam envolvidos em atividades de negócio')" width="25" height="25" title="Apagar o fiador"></a>
                                          </td>
                                      </tr>
                                   </tbody>
                                  <?php
                                  }
                                  ?>
                              </table>
                          <?php
                          }
                          $mysqli->close();
                          ?>

          </div>
        </div>
        </section>
      </body>

</html>
