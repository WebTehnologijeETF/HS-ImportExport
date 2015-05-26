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
<div class="login-card">

    <h1>Login</h1><br>
	  <form action='news_managment.php' method='post'>
		<input type="text" name="user" placeholder="Username">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" name="login" class="login login-submit" value="login">
	  </form>
    
  <div class="login-help">
	<a href="#">Register</a>|<a href="#">Forgot Password</a>
  </div>
</div>
  <br>
  <?php include("../inc/footer.html");?>    
  </body>
</html>