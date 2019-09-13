<?php 
  include "connectiondb.php";
  session_start();

  if (!isset($_SESSION['login'])) {
    echo "<script language='javascript' type='text/javascript'>window.location.href='loginAdmin.php';</script>";
  }

  $login = $_SESSION['login'];

  $msg = "";

  if(isset($_POST["txtAdmin"]) || isset($_POST["password"]) || isset($_POST["name"])) {

      $username = $_POST['txtAdmin'];
      $name = $_POST['txtName'];
      $password = MD5($_POST['txtPassword']); // md5 criptography

      $verify = "SELECT nameUser FROM user WHERE nameUser = '$username'";

      $result = mysqli_query($conn, $verify);
      $array = mysqli_fetch_array($result);
      $logarray = $array['nameAdmin'];

      if($logarray == $username){
        echo "<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='indexAdmin.php';</script>";
        die();
      }
      else{
        $insert = "INSERT INTO user(nameUser,passwordUser) VALUES ('$username','$password')";
        $query = mysqli_query($conn, $insert);

        if($query){
          echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='indexAdmin.php'</script>";
        }
        else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='indexAdmin.php'</script>";
        }
      }
      mysqli_close($conn); // encerra conexão 
    } // Fim do ISSET
 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IntraSDOOSE - Serviço de Atendimento Móvel de Urgência</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php include 'mainAdmin.php'; ?> <!-- include main layout of sdoose -->

  <!-- Begin Principal Area Content -->
  <div class="container-fluid">
    <div class="text-center">
      <h1>Admin - SDOOSE Intranet</h1>
    </div> <!-- /.container-fluid -->
    <br>
    <div class="text-center">
      <h4>Sistema de Criação de Usuários</h4>
      <div class="col-lg-12">
        <div class="p-5">
          <form class="user" method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" name="txtName" aria-describedby="Nome do Operador" placeholder="Insira o Operador">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" name="txtAdmin" aria-describedby="Nome de Usuário" placeholder="Insira o nome do usuário SDOOSE">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" name="txtPassword" placeholder="Senha">
            </div>
            <input class="btn btn-primary btn-user btn-block" type="submit" value="Entrar">
          </form>
        </div>
      </div>
      <div class="col-4"></div>
    </div>
  </div> <!-- End of Main Content -->

  <?php include 'footer.php' ?>  <!-- include footer layout of sdoose -->
  <!-- the footer layout should be included out of main content. -->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
