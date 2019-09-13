<?php 
  include "connectiondb.php";
  session_start();

  if (!isset($_SESSION['login'])) {
    echo "<script language='javascript' type='text/javascript'>window.location.href='login.php';</script>";
  }

  $login = $_SESSION['login'];

  //$sql = "SELECT nome FROM usuario WHERE login = '$login'";

  //$query = mysqli_query($conn,$sql);
  //$array = mysqli_fetch_array($query);
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

  <style type="text/css">
    #mapsApi{
      height:700px;
      width:1000px;
    }
  </style>
</head>

<body id="page-top">

  <?php include 'main.php'; ?> <!-- include main layout of sdoose -->

  <!-- Begin Principal Area Content -->
  <div class="container-fluid">
    <div class="text-left">
      <h1>Tempo Real - SAMU</h1>
    </div> <!-- /.container-fluid -->
    <div id="mapsApi"></div>
      <script>
        function initMap(){
          var coordinate = {lat: -23.996598, lng: -48.892985};

          var mapsApi = new google.maps.Map(document.getElementById('mapsApi'),
          {
            zoom: 15,
            center: coordinate 
          });
        }
      </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9deBI67mLyog8YX4ZOQMOrCpR4Kn4knM&callback=initMap" type="text/javascript"></script>
  </div> <!-- End of Main Content -->

  <!--<?php //include 'footer.php' ?> --> <!-- include footer layout of sdoose -->
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
