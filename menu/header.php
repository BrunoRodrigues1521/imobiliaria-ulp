
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Imobiliaria</title>
  <link rel="stylesheet" href="../styles/stylesheet.css">

</head>
  <header class="top">
    <nav>
      <ul>
        <li class="logo"><a href="main.php">Logo da Imobiliaria</a></li>
        <?php
        if($_SESSION['role']=="salesmng"){
          echo '
          <li class="items"><a href="financeira.php">Gestao Financeira</a></li>
          <div class="logoutbutton">';
        } else if ($_SESSION['role']=="admin"){
          echo '
          <li class="items"><a href="main.php">Pagina Inicial</a></li>
          <li class="items"><a href="propriedades.php">Propriedades</a></li>
          <li class="items"><a href="clientes.php">Area Clientes</a></li>
          <li class="items"><a href="funcionarios.php">Gestao Funcionarios</a></li>
          <li class="items"><a href="financeira.php">Gestao Financeira</a></li>';
        } else if ($_SESSION['role']=="workersmng"){
          echo '
          <li class="items"><a href="funcionarios.php">Gestao Funcionarios</a></li>
          <li class="items">';
        }
        ?>
        <?php
        if (isset($_SESSION['uId'])){
          echo '
            <li class="items"><form action="logout.function.php" method="post">
            <button class="logoutbutton" type=submit>Encerrar Sessão</button>
          </form></li>';}
          ?>
        </div>
      </ul>
    </nav>
  </header>
