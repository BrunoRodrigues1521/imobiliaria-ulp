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
  <script src="../scripts/filtrar.js"></script>

</head>

<header>
  <?php include 'header.php' ?>
  </header
  <body>
    <section class="propriedades-table1">
          <div class="grid-item">
            <div class="table" align="center">
              <h3>Atividades</h3>
              <input type="text" id="userinput"  placeholder="Procurar">
              <?php
              include_once 'dbconnect.php'; //inclui o servidor SQL
              $sql = "SELECT * FROM atividade"; //"fiador" e' o nome da tabela a ser utilizada
              $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"
              ?>
              <input type="button" class="addbutton" value="Adicionar Atividade" onclick="location='formAtividade.php'" />
              <?php
              if ($resultado->num_rows > 0) { //verificar se existem linhas
              ?>

                  <!-- Tabela com a lista de fiadores -->
                  <table class="table" align="center" >
                      <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Morada</th>
                            <th>Cliente</th>
                            <th>Fiador</th>
                            <th>Preço</th>
                            <th>Data</th>
                            <th>Comissão</th>
                            <th>Ações</th>

                          </tr>
                      </thead>

                      <?php
                      while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                      ?>
                  <tbody id="table">
                    <tr>
                      <?php
                      $sql = "SELECT nome FROM funcionarios WHERE id_funcionario =" . $linha['id_funcionario'];
                      $funcionarioResultado = $mysqli->query($sql);
                      $funcionario= $funcionarioResultado->fetch_assoc();
                      ?>
                      <td> <?php echo $funcionario["nome"] ?> </td>

                      <?php
                      $sql1 = "SELECT morada FROM propriedade WHERE id_propriedade =" . $linha['id_propriedade'];
                      $moradaResultado = $mysqli->query($sql1);
                      $morada= $moradaResultado->fetch_assoc();
                      ?>
                      <td> <?php echo $morada["morada"] ?> </td>
                      <?php
                      $sql2 = "SELECT nome FROM cliente WHERE id_cliente =" . $linha['id_cliente'];
                      $clienteResultado = $mysqli->query($sql2);
                      $cliente= $clienteResultado->fetch_assoc();
                      ?>
                      <td><?php echo $cliente["nome"] ?></td>
                      <?php
                        if($linha['id_fiador']==NULL){
                          echo '<td>Nenhum</td>';
                        }
                        else{
                          $sql3 = "SELECT nome FROM fiador WHERE id_fiador =" . $linha['id_fiador'];
                          $fiadorResultado = $mysqli->query($sql3);
                          $fiador= $fiadorResultado->fetch_assoc();
                          echo '<td>'.$fiador["nome"].'</td>';
                        }
                        ?>

                      <td><?php echo $linha["preco"] ?></td>
                      <td><?php echo $linha["data"] ?></td>
                      <td><?php echo $linha["comissao"]?></td>
                      <td><a href="apagarAtividade.php?id_atividade=<?php echo $linha["id_atividade"] ?>&acao=apagar">
                          <img src="../assets/remove.png" onclick="return confirm('Tem a certeza que deseja apagar?')" width="25" height="25" title="Apagar o fiador"></a>
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

    </section>

            <section>
                  <div class="grid-item">
                    <div class="table" align="center">
                      <h3>Propostas</h3>
                      <input type="text" id="userinput2" placeholder="Procurar por nome">
                      <?php
                      include_once 'dbconnect.php'; //inclui o servidor SQL
                      $sql = "SELECT * FROM proposta"; //"fiador" e' o nome da tabela a ser utilizada
                      $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"
                      ?>
                      <input type="button" class="addbutton" value="Adicionar Proposta" onclick="location='formProposta.php'" />
                      <?php
                      if ($resultado->num_rows > 0) { //verificar se existem linhas
                      ?>

                          <!-- Tabela com a lista de fiadores -->
                          <table class="table" align="center" >
                              <thead>
                                  <tr>

                                      <th>Cliente</th>
                                      <th>Propriedade</th>
                                      <th>Proposta</th>
                                      <th>Estado</th>
                                      <th>Ações</th>

                                  </tr>
                              </thead>
                              <?php
                              while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                              ?>
                                <tbody id="table2">
                                  <tr>


                                      <?php
                                      $sql = "SELECT nome FROM cliente WHERE id_cliente =" . $linha['id_cliente'];
                                      $clienteResultado = $mysqli->query($sql);
                                      $cliente= $clienteResultado->fetch_assoc();
                                      ?>
                                      <td> <?php echo $cliente["nome"] ?> </td>

                                      <?php
                                      $sql1 = "SELECT morada FROM propriedade WHERE id_propriedade =" . $linha['id_propriedade'];
                                      $moradaResultado = $mysqli->query($sql1);
                                      $morada= $moradaResultado->fetch_assoc();
                                      ?>
                                      <td> <?php echo $morada["morada"] ?> </td>

                                      <td><?php echo $linha["proposta"] ?></td>
                                      <td><?php echo $linha["estado"] ?></td>
                                      <td><a href="apagarProposta.php?id_proposta=<?php echo $linha["id_proposta"] ?>&acao=apagar">
                                          <img src="../assets/remove.png" onclick="return confirm('Tem a certeza que deseja apagar?')" width="25" height="25" title="Apagar a proposta"></a>
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
