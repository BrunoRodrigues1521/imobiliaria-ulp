<?php
session_start();
if(!empty($_SESSION['uId'])){
  header("Location:warningpage.php?error=trueauth");
}

 ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
<main>
<head>
  <meta charset="utf-8">
  <title>Imobiliaria</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" type="text/css" href="styles/login.css">
  </head>

  <body>

  <div>
    <img class="background_logo" src="assets/logo.png" height="100" width"100" </img><br></br>
    <form class="login-form" action="php/login.function.php" method="post">
        <label>Iniciar Sessao</label>
        <input type ="text" name=email placeholder="Utilizador/Email">
        <input type ="password" name=pass placeholder="Insira a palavra-passe">
        <button type ="login" name=login >Login</button>
        <?php
          if(isset($_GET['error'])){
            if($_GET['error'] == "emptyfields"){
            echo '<p class="signuperror">Preencha todos os campos </p>';
            }
            if($_GET['error'] == "sessionexpired"){
            echo '<p class="signuperror">A sua sessão expirou.Autentique-se novamente </p>';
            }
            if($_GET['error'] == "userdontexists"){
            echo '<p class="signuperror">Este utilizador não existe </p>';
            }
            if($_GET['error'] == "wrongpassword"){
            echo '<p class="signuperror">Palavra-passe Incorreta </p>';
            }
          }
         ?>
        </form>
        <a href="php/signup.php">Criar Conta</a>
   </div>

 </body>

 </main>
