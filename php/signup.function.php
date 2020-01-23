<?php
      if (isset($_POST['signup'])){
        require 'dbconnect.php';

        $username=$_POST['userid'];
        $email=$_POST['useremail'];
        $password=$_POST['userpass'];
        $passwordcheck=$_POST['userpass-check'];
        $role=$_POST['role'];

        if (empty($username)||empty($email)||empty($password)||empty($passwordcheck)){
          header("Location:signup.php?error=emptyfields");
          exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)&& !preg_match("/^[A-Za-z0-9]*$/",$username)){
          header("Location:signup.php?error=invalidemail");
          exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          header("Location:signup.php?error=invalidemail");
          exit();
        }
        else if(!preg_match("/^[A-Za-z0-9]*$/",$username)){
          header("Location:signup.php?error=invaliduser");
          exit();
        }
        else if($password !== $passwordcheck){
          header("Location:signup.php?error=passwordmismatch");
          exit();
        }
        else{
          $sql="SELECT userName,userEmail FROM utilizadores WHERE userName=? OR userEmail=?";
          $command=mysqli_stmt_init($mysqli);
          if(!mysqli_stmt_prepare($command,$sql)){
            echo "Erro de conexâo".$mysqli->error;
            exit();
          }
          else{
            mysqli_stmt_bind_param($command,"ss",$username,$email);
            mysqli_stmt_execute($command);
            mysqli_stmt_store_result($command);
            $resultCheck=mysqli_stmt_num_rows($command);
            if($resultCheck>0){
              header("Location:signup.php?error=useremailtaken");
              exit();
            }
            else{
              $sql="INSERT INTO utilizadores(userName,userEmail,userPass,role) VALUES(?,?,?,?)";
              $command=mysqli_stmt_init($mysqli);
              if(!mysqli_stmt_prepare($command,$sql)){
                echo "Erro de conexao".$mysqli->error;
                exit();
              }
              else{
                $hashedpass=password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($command,"ssss",$username,$email,$hashedpass,$role);
                mysqli_stmt_execute($command);
                header("Location:index.php?signup=sucess");
                exit();

              }
            }
          }
        }
      }
      else{
        header("Location:main.php");
        exit();
      }
 ?>
