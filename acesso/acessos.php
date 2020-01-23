<?php
session_start();
if (empty($_SESSION['uId'])) {
  header("Location:../index.php");
}

if (!$_SESSION['role'] == "admin") {
  header("Location:../warningpage.php?error=permdenied");
}

$timeout = 3600;

if (isset($_SESSION['timeout'])) {

  $duracao = time() - (int) $_SESSION['timeout'];
  if ($duracao > $timeout) {
    session_destroy();
    session_start();
    header("Location:../index.php");
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
  <?php include '../header.php' ?>
</header <body>
<section class="propriedades-table1">
  <h1>Gestão Acessos</h1>

</section>
<div class="grid-item">
  <div class="table" align="center">
    <h3>Histórico</h3>

    <input type="text" id="userinput" placeholder="Procurar por nome">
    <?php
    include_once '../database/dbconnect.php'; //inclui o servidor SQL
    $sql = "SELECT * FROM acessos"; //"fiador" e' o nome da tabela a ser utilizada
    $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"
    ?>
    <?php
    if ($resultado->num_rows > 0) { //verificar se existem linhas
    ?>

      <!-- Tabela com a lista de fiadores -->
      <table class="table" align="center">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Data/Hora Acesso</th>


          </tr>
        </thead>
        <?php
        while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
        ?>
          <tbody id="table">
            <tr>
              <!-- Imprime os fiadores na tabela -->
              <td><?php echo $linha["userName"] ?></td>
              <td><?php echo $linha["userRole"] ?></td>
              <td><?php echo $linha["auth_timestamp"] ?></td>

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