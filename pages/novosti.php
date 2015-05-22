<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HS_ImportExport - World of import & export</title>
<link rel="stylesheet" type="text/css" href="css/stajl.css">
<script src="js/javascript.js"></script>
</head>
<body>
    <h1>News</h1>
    <h6>------</h6>
    <a href="javascript:history.back()">Back to previous page.</a>

    <?php
	if(isset($_REQUEST['dodajj'])){
		if(isset($_REQUEST['autorr']) && $_REQUEST['autorr']!='' && isset($_REQUEST['komentarr']) && $_REQUEST['komentarr']!=''){
		   $veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
		   $veza->exec("set names utf8");
		   $ubacivanje = $veza->query("insert komentar SET vijest=".$_GET['id'].", tekst='".$_REQUEST['komentarr']."', autor='".$_REQUEST['autorr']."'");
		}
		}
		if(isset($_GET['id'])){
       $veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
       $veza->exec("set names utf8");
       $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest where id=".$_GET['id']);
       foreach ($rezultat as $vijest) {
          print "<h1>".$vijest['naslov']."</h1>".
      "<small>".$vijest['autor']."</small>".
      "<p>".$vijest['tekst']."</p>".
      "<small>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</small><br>";
      $rezultatKomentari = $veza->query("select id, vijest, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2 FROM komentar WHERE vijest= ".$vijest['id']);
      print "<h1>KOMENTARI</h1>";
      
      foreach ($rezultatKomentari as $komentar) {
          print  "<small>Datum: ".date("d.m.Y. (h:i)", $komentar['vrijeme2'])."</small><br>".
                 "<small>Autor: ".$komentar['autor']."</small>".
                 "<p>Tekst: ".$komentar['tekst']."</p>"
				 ."<p>--------------------</p>"
				 ;
   }
	}
	print "<br><form action='#' method='post'>
  <input type='text' name='autorr' id='autorr'><br>
  <input type='hidden' name='id' id='id' >
  <textarea name='komentarr' id='komentarr' >
  </textarea><br>
  <input type='submit' name='dodajj'>  
</form>";

	
		}
		
		


    ?>
  </body>
</html>