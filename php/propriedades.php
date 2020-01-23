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
  <script src="../scripts/filtrarcoluna.js"></script>


</head>
<header>
<?php include 'header.php' ?>
</header>
  <body>
    <section class="propriedades-table1">
          <div class="grid-item">
            <div class="table" align="center">
              <h3>Propriedades</h3>
              <input type="text" id="userinput" onkeyup="filtrarcoluna()" placeholder="Procurar ">
              <?php
              include_once 'dbconnect.php'; //inclui o servidor SQL
              $sql = "SELECT * FROM propriedade"; //"fiador" e' o nome da tabela a ser utilizada
              $resultado = $mysqli->query($sql); //coloca no objeto "resultado" a query do objeto "ligação"
              ?>
              <input type="button" class="addbutton" value="Adicionar Propriedade" onclick="location='formPropriedade.php'" />
              <?php
              if ($resultado->num_rows > 0) { //verificar se existem linhas
              ?>

                  <!-- Tabela com a lista de fiadores -->
                  <table class="table" id="tabledata" align="center" >
                      <thead>
                          <tr>
                            <th>Proprietario</th>
                            <th>Morada</th>
                            <th>Código Postal</th>
                            <th>Tipologia</th>
                            <th>Preço Proposto</th>
                            <th>Data Adição</th>
                            <th>Atividades</th>

                          </tr>
                      </thead>
                      <?php
                      while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                      ?>
                      <tbody id="table">
                          <tr>
                              <!-- Imprime os propriedades na tabela -->
                              <?php
                              $sql = "SELECT nome FROM proprietario WHERE id_proprietario =" . $linha['id_proprietario'];
                              $proprietarioResultado = $mysqli->query($sql);
                              $proprietario= $proprietarioResultado->fetch_assoc();
                              ?>
                              <td><?php echo $proprietario["nome"] ?></td>
                              <td><?php echo $linha["morada"] ?></td>
                              <td><?php echo $linha["codigoPostal"] ?></td>
                              <td><?php echo $linha["tipologia"] ?></td>
                              <td><?php echo $linha["preco"] ?></td>
                              <td><?php echo $linha["data"] ?></td>

                              <td>
                                  <a href="formEditPropriedade.php?id_propriedade=<?php echo $linha["id_propriedade"] ?>&acao=editar">
                                      <img src="../assets/update.png" width="25" height="25" title="Editar o propriedade"></a>
                                  <a href="apagarPropriedade.php?id_propriedade=<?php echo $linha["id_propriedade"] ?>&acao=apagar">
                                      <img src="../assets/remove.png" onclick="return confirm('Tem a certeza que deseja apagar?Lembre-se que propriedades em atividades de negócio não podem ser apagadas')" width="25" height="25" title="Apagar o propriedade"></a>
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
