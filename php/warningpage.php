
 <!DOCTYPE html>

 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8">
   <title>Imobiliaria</title>
   <link rel="stylesheet" href="../styles/warning.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="../scripts/voltar.js"></script>

 </head>

  <body>
    <?php
      if(isset($_GET['error'])){
        if($_GET['error'] == "trueauth"){

        echo '
              <img class="done_animation" src="../assets/done_animation.gif" height="400" width"400" </img><br></br>
              <p class="signuperror">Já se encontra autenticado </p>
              <button class="warning_buttons" onclick="avancar()">Voltar</button><br></br>
              <form class="form-inline my-2 my-lg-0" action="logout.function.php">
              <button class="warning_buttons" type="submit">Encerrar Sessão</button>
              </form>';
        }
        if($_GET['error'] == "permdenied"){

        echo '
              <img class="done_animation" src="../assets/not_allowed.png" height="300" width"300" </img><br></br>
              <p class="signuperror">Parece que não tem permissões para aceder a esta página </p>
              <button class="warning_buttons" onclick="voltar()">Voltar</button><br></br>';
        }
      }
     ?>
  </body>


</html>
