<?php
session_start();
if(empty($_SESSION['uId'])){
  header("Location:index.php");
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
  <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1">
  <title>Imobiliaria</title>
  <link rel="stylesheet" href="../styles/stylesheet.css">

</head>
  <header>
  <?php include 'header.php' ?>
  </header>
  <body>
        <section class="main-grid" align="center">
          <h1>Pagina Inicial</h1>
          <div class="grid-container">
            <div class="grid-item1">
              <?php
              include_once 'dbconnect.php'; //inclui o servidor SQL
              $sql = "SELECT count(id_cliente) AS 'NClientes' FROM cliente";
              $resultado = $mysqli->query($sql);
              $sql2 = "SELECT count(id_fiador) AS 'NFiadores' FROM fiador";
              $resultado2 = $mysqli->query($sql2);
              ?>
              <?php
              if ($resultado->num_rows > 0) { //verificar se existem linhas
              ?>
                      <?php
                      while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                      ?>
                              <p class="preview-item1">Clientes: <?php echo $linha["NClientes"] ?></p>
                      <?php
                      }
                      ?>

                      <?php
                      while ($linha = $resultado2->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                      ?>
                              <p class="preview-item1">Fiadores: <?php echo $linha["NFiadores"] ?></p>
                      <?php
                      }
                      ?>
              <?php
              }
              ?>


            </div>
            <div class="grid-item2">

              <p><?php echo $_SESSION["unId"];?></p>
            </div>
            <div class="grid-item3">
              <?php
              include_once 'dbconnect.php'; //inclui o servidor SQL
              $sql = "SELECT sum(preco) AS 'NVendas' FROM atividade";
              $resultado = $mysqli->query($sql);
              $sql2 = "SELECT sum(comissao) AS 'NComissoes' FROM atividade";
              $resultado2 = $mysqli->query($sql2);
              ?>
              <?php
              if ($resultado->num_rows > 0) { //verificar se existem linhas
              ?>
                      <?php
                      while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                      ?>
                              <p class="preview-item1">Vendas: <?php echo $linha["NVendas"] ?></p>
                      <?php
                      }
                      ?>

                      <?php
                      while ($linha = $resultado2->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                      ?>
                              <p class="preview-item1">Comissões: <?php echo $linha["NComissoes"] ?></p>
                      <?php
                      }
                      ?>
              <?php
              }
              ?>


          </div>

        </section>
</body>

</html>
