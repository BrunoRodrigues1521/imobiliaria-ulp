<?php

  if(isset($_POST['login'])){
    require 'dbconnect.php';
                                //vai buscar os campo email e password ao formulario de login
    $email= $_POST['email'];
    $password = $_POST['pass'];

    if(empty($email)||empty($password)){              //verifica se o utilizador tentou aceder ao index sem fazer login
      header("Location:index.php?error=emptyfields");
      exit();
    }
    else{
      $sql="SELECT * FROM utilizadores WHERE userName=? OR userEmail=?;";
      $command=mysqli_stmt_init($mysqli);
      if(!mysqli_stmt_prepare($command,$sql)){      //seleciona o email ou username existente na base de dados
        echo "Erro de comunicação".$mysqli->error;
        exit();
      }
      else{
        mysqli_stmt_bind_param($command,"ss",$email,$email);
        mysqli_stmt_execute($command);
        $result= mysqli_stmt_get_result($command);
        if($row=mysqli_fetch_assoc($result)){
          $passCheck= password_verify($password, $row['userPass']);   //se a procura na base de dados tiver sucesso verifica-se se
                                                                  //a password introduzida pelo utlizador corresponde a guardada na base de dados
          if($passCheck== false){
            header("Location:index.php?error=wrongpassword");
            exit();
          }
          else if($passCheck == true){
            session_start();
            $_SESSION['uId']=$row['userId'];   //armazenar a variavel global Session de modo a permitir guardar e armazenar todas as nossas informacoes e preferencias
                                          //em todas as paginas do site
            $_SESSION['unId']=$row['userName'];

            $_SESSION['role']=$row['role'];

            $username=$_SESSION['unId'];
            $userole=$_SESSION['role'];


            $sql="INSERT INTO acessos(userName,userRole) VALUES(?,?)";
            $command=mysqli_stmt_init($mysqli);
            if(!mysqli_stmt_prepare($command,$sql)){
              echo "Erro de conexao".$mysqli->error;
              exit();
            }
            else{
              mysqli_stmt_bind_param($command,"ss",$username,$userole);
              mysqli_stmt_execute($command);

            if($_SESSION['role']=="workersmng"){
              header("Location:funcionarios.php?login_sucess");
            }else if($_SESSION['role']=="salesmng"){
              header("Location:financeira.php?login_sucess");
            }else{
            header("Location:main.php?login_sucess");
          }
            exit();
          }

          }
          else{
            header("Location:index.php?error=unknownerror");
            exit();                                           //garatir que apenas dados do tipo boolean permitw o login ser feito com sucesso
          }

        }
        else{
          header("Location:index.php?error=userdontexists");
          exit();
        }
      }
    }
  }
else{
  header("Location:index.php");
  exit();
}

 ?>
