<!DOCTYPE html>
 <main>
   <head>
     <meta charset="utf-8">
     <title>Imobiliaria</title>
     <link rel="stylesheet" type="text/css" href="../styles/signup.css">

   </head>
   <div>
      <img class="background_logo" src="../assets/logo.png" height="100" width"100" </img><br></br>
      <form class="signup-form" action ="signup.function.php" method="post">
        <label>Criar Conta </label>
        <input type="text" name="userid" placeholder="Nome de Utilizador">
        <input type="text" name="useremail" placeholder="Email">
        <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="Mínimo 8 caracteres sendo um deles uma letra maiuscula e uma minuscula e um número" type="password" name="userpass" placeholder="Palavra-Passe">
        <input type="password" name="userpass-check" placeholder="Repita a palavra-passe">
        <select id="role" name="role">
          <option value="admin">Administrador</option>
          <option value="salesmng">Gestor de Vendas</option>
          <option value="workersmng">Gestor de Staff</opton>
        </select><br><br>
        <?php
          if(isset($_GET['error'])){
            if($_GET['error'] == "emptyfields"){
            echo '<p class="signuperror">Preencha todos os campos </p>';
            }
            if($_GET['error'] == "passwordmismatch"){
            echo '<p class="signuperror">As palavras passe não coincidem </p>';
            }
            if($_GET['error'] == "useremailtaken"){
            echo '<p class="signuperror">Email ou nome de utilizador já registado </p>';
            }
          }
         ?>
        <button type="submit" name="signup">Criar Conta</button>
      </form>
      <a href="index.php">Já tem conta? Inicie Sessão</a>
    </div>
  </main>
