<?php 
	session_start();

	if (isset($_SESSION['login'])) {
		session_destroy(); //destruir a sessão!
		
		header('location:login.php');
	}
 ?>