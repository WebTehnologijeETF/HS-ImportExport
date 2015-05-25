<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HS_ImportExport - World of import & export</title>
<link rel="stylesheet" type="text/css" href="../css/stajl.css">
<script src="../js/javascript.js"></script>
</head>
<body id='tijelo'>
 <?php 
	$root = $_SERVER['DOCUMENT_ROOT'];
	include($root.'/hs-importexport/inc/header.html');
	?>
<div id="sadrzaj" class="sadrzaj">
 <h2 class='komentar_zaglavlje'>NEWS AND COMMENTS</h2>
	<div class='div_klik'><a href='/hs-importexport/news.php'>Back to news</a></div>
<!--$a = htmlEntities($_GET['a'], ENT_QUOTES); -->
    <?php
	$brojac=0;
	if(isset($_REQUEST['dodajj'])){
		if(isset($_REQUEST['autorr']) && htmlEntities($_REQUEST['autorr'], ENT_QUOTES)!='' && isset($_REQUEST['komentarr']) && htmlEntities($_REQUEST['komentarr'], ENT_QUOTES)!=''){
		   if(isset($_REQUEST['emaill']) && htmlEntities($_REQUEST['emaill'], ENT_QUOTES)!=''){
			   if(!filter_var(htmlEntities($_REQUEST['emaill'], ENT_QUOTES), FILTER_VALIDATE_EMAIL)){
				   
				$message = "Wrong Email address";
				echo "<script type='text/javascript'>alert('$message');</script>";
				goto dalje;
			   }
		   }
		   $veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
		   $veza->exec("set names utf8");
			$timestamp = date('Y-m-d G:i:s');
		   $ubacivanje = $veza->query("insert komentar SET vrijeme='$timestamp', vijest=".htmlEntities($_GET['id'],ENT_QUOTES).", tekst='".htmlEntities($_REQUEST['komentarr'],ENT_QUOTES)."', autor='".htmlEntities($_REQUEST['autorr'], ENT_QUOTES)."',email='".htmlEntities($_REQUEST['emaill'], ENT_QUOTES)."'");
		}
		}
		dalje:
		if(isset($_GET['id'])){
       $veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
       $veza->exec("set names utf8");
       $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest where id=".$_GET['id']);
       foreach ($rezultat as $vijest) {
         /* print "<h1>".$vijest['naslov']."</h1>".
      "<small>".$vijest['autor']."</small>".
      "<p>".$vijest['tekst']."</p>".
      "<small>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</small><br>";*/
	   print "<div class='jedna_novost'>";
          print "<h1>".$vijest['naslov']."</h1>".
      "<small>Posted ".date("d.m.Y. (h:i)", $vijest['vrijeme2'])." by ".$vijest['autor']."</small>".
      "<p>".$vijest['tekst']."</p>";
      $rezultatKomentari = $veza->query("select id, vijest, tekst, autor,email, UNIX_TIMESTAMP(vrijeme) vrijeme2 FROM komentar WHERE vijest= ".$vijest['id']);
      
	  print "</div>
	  <h3 class='komentar_zaglavlje'>Comments</h3>";
      
	  $brojac=0;
      foreach ($rezultatKomentari as $komentar) {
		  $brojac++;
          print  "<table class='tabela_komentari' id='".$brojac."'><tr><td><small>Date: ".date("d.m.Y. (h:i)", $komentar['vrijeme2'])."</small></td></tr>".
                 "<tr><td><small>Autor: ".$komentar['autor']."</small></td></tr>".
				 "<tr><td><small>Email: <a href='mailto:".$komentar['email']."'>".$komentar['email']."</a></td></tr></small>".
                 "<tr><td><p>Comment: ".$komentar['tekst']."</p></td></tr>".
				 "<tr><td><p class='broj_komentara'>Comment #".$brojac."</p></td></tr>".
				 
				 "</table>"
				 
				 ;
   }
   if($brojac==0){
	    print "<table class='tabela_komentari'><tr><td><p class='broj_komentara'>No comments! Be first to comment!</p></td></tr></table>";
   }
	}
	print "<h3 class='komentar_zaglavlje'>Leave a comment</h3>";
	print "<div class='ostavljanje_komentara'><table ><form action='#".$brojac."' method='post'>
  <tr><td><p class='pe'>Author: </p></td><td><input class='inp' type='text' name='autorr' id='autorr'></td></tr>
  <tr><td><p class='pe'>Email: </p></td><td><input type='text' name='emaill' id='emaill'></td></tr>
  <input type='hidden' name='id' id='id' >
  <tr><td><p class='pe'>Comment: </p></td><td><textarea name='komentarr' id='komentarr'>
  </textarea></td></tr>
  <tr><td></td><td><input id='button_submit' type='submit' name='dodajj'></td><td></td></tr>
  
</form></table></div>";

	
		}
		
		


    ?>
	<br>
	
	</div>
	 <?php 
	$root = $_SERVER['DOCUMENT_ROOT'];
	include("../inc/footer.html");?>
  </body>
</html>