<?php

require '../opt/opt.php';

session_start();

if(isset($_REQUEST['logout'])){
      session_unset();
    }
if(isset($_REQUEST['proceed'])){
	if($_SESSION['type'] == "adm")
		header("Location: /hs-importexport/adm/news_managment.php");
	if($_SESSION['type']=="edit")
					header("Location: /hs-importexport/adm/news_managment_editor.php");
}
if (isset($_REQUEST['username']) && $_REQUEST['username']!='' && isset($_REQUEST['password']) && $_REQUEST['password']!='') {
	
	$veza = new PDO($c_string, $root, $pass);
	$veza->exec("set names utf8");
	$username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
	$username=stripslashes($username);
	$password=stripslashes($password);
    $upit = $veza->prepare("SELECT * FROM korisnici WHERE korisnik=? and sifra=?");
 	$upit->execute(array($username,$password));
		foreach ($upit as $vijest) {
			if($vijest['korisnik']==$username){
				$_SESSION['type']= $vijest['tip'];
				$_SESSION['username'] = $vijest['korisnik'];
				$_SESSION['password'] = $vijesti['sifra'];
				if($vijest['tip']=="adm"){
					header("Location: /hs-importexport/adm/news_managment.php");
				}
				if($vijest['tip']=="edit")
					header("Location: /hs-importexport/adm/news_managment_editor.php");
			}
		}
}
	
?>

<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="UTF-8" />
    <title>HS_ImportExport - World of import &amp; export</title>
    <link rel="stylesheet" type="text/css" href="../css/stajl.css" />
    <script src="../js/javascript.js"></script>
  </head>
  <body >
  <?php include("../inc/header.html");?>
  <br>

<?php
if(isset($_SESSION['username'])){
	print "<div class='login-card'><br><h3>You are already logged in as ";
	if($_SESSION['type']=="adm") 
		print "administrator!"; 
	else
		print "editor!";

	print "</h3><br><br>
	  <form action='login.php' method='post'><br>
	<input type='submit' name='proceed' class='login login-submit' value='Proceed'>
	<input type='submit' name='logout' class='login login-submit' value='Logout'>
	  </form></div>";
}else{
	print "<div class='login-card'>
    <h1>Login</h1><br>
	  <form action='login.php' method='post'>
		<input type='text' name='username' placeholder='Username'>
		<input type='password' name='password' placeholder='Password'>
		
		<input type='submit' name='login' class='login login-submit' value='login'>
	  </form>
    
  <div class='login-help'>
	<a href='#'>Register</a>|<a href='#'>Forgot Password</a>
  </div>
</div>";
}

?>

  <br>
  <?php include("../inc/footer.html");?>    
  </body>
</html>