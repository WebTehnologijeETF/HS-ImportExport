<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Comment added</title>
  </head>
<body>
    <h1>Comment succesfuly added! </h1>
    <a href="javascript:history.back()">Back to previous page.</a>
	<?php
	if(isset($_GET['id'])){
		print "<p>".$_GET['id']."</p>";
	}
	?>
	
	
  </body>
</html>