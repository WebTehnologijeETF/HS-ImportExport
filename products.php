<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HS_ImportExport - World of import & export</title>
<link rel="stylesheet" type="text/css" href="css/stajl.css">
<script src="js/javascript.js"></script>
</head>
	

<body>
<?php 
	$root = $_SERVER['DOCUMENT_ROOT'];
	include("inc/header.html");

	echo "<script type='text/javascript'>".
	   "otvori('pages/products1.html');".
	   "</script>";
?>
	<div id="sadrzaj" class="sadrzaj produkti">
		
	</div>
	<?php include("inc/footer.html");?>

</html>