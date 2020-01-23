<?php
session_start();
if(empty($_SESSION['uId'])){
  header("Location:index.php");
}
if($_SESSION['role']=="salesmng"){
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
  <script src="../scripts/filtrar.js"></script>

</head>

<header>
  <?php include 'header.php' ?>
  </header
  <body>
        <section class="propriedades-table1">
          <h1>Gestão Funcionarios</h1>

  <section>
                      <div class="grid-item">
                        <div class="table" align="center">
                          <h3>Funcionarios</h3>

                          <input type="text" id="userinput"  placeholder="Procurar por nome">
                          <?php
                          include_once 'dbconnect.php'; //inclui o servidor SQL
                          $sql = "SELECT * FROM funcionarios"; //"fiador" e' o nome da tabela a ser utilizada
                          $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"
                          ?>
                          <input type="button" class="addbutton" value="Adicionar Funcionario" onclick="location='formFuncionario.php'" />
                          <?php
                          if ($resultado->num_rows > 0) { //verificar se existem linhas
                          ?>

                              <!-- Tabela com a lista de fiadores -->
                              <table class="table"  align="center">
                                  <thead>
                                      <tr>
                                          <th>Nome</th>
                                          <th>Idade</th>
                                          <th>Nif</th>
                                          <th>Telefone</th>
                                          <th>Morada</th>
                                          <th>Email</th>
                                          <th>Tipo Contrato</th>
                                          <th>Data</th>
                                          <th>Ações</th>

                                      </tr>
                                  </thead>
                                  <?php
                                  while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                                  ?>
                                    <tbody id="table">
                                      <tr>
                                          <!-- Imprime os fiadores na tabela -->
                                          <td><?php echo $linha["nome"] ?></td>
                                          <td><?php echo $linha["idade"] ?></td>
                                          <td><?php echo $linha["nif"] ?></td>
                                          <td><?php echo $linha["telefone"] ?></td>
                                          <td><?php echo $linha["morada"]?></td>
                                          <td><?php echo $linha["email"] ?></td>
                                          <td><?php echo $linha["tipocontrato"] ?></td>
                                          <td><?php echo $linha["data"] ?></td>
                                          <td>
                                              <a href="formEditFuncionario.php?id_funcionario=<?php echo $linha["id_funcionario"] ?>&acao=editar">
                                                  <img src="../assets/update.png" width="25" height="25" title="Editar o fiador"></a>
                                              <a href="apagarFuncionario.php?id_funcionario=<?php echo $linha["id_funcionario"] ?>&acao=apagar">
                                                  <img src="../assets/remove.png" onclick="return confirm('Tem a certeza que deseja apagar?Lembre-se que só podera apagar funcionarios que não estejam envolvidos em atividades de negócio')" width="25" height="25" title="Apagar o fiador"></a>
                                          </td>
                                      </tr>
                                    </tbody>
                                  <?php
                                  }
                                  $mysqli->close();
                                  ?>
                              </table>
                          <?php
                          }

                          ?>
                        </div>
                      </div>
                    </section>
                  </body>

</html>
