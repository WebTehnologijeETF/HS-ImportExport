<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="UTF-8" />
    <title>HS_ImportExport - World of import &amp; export</title>
    <link rel="stylesheet" type="text/css" href="../css/stajl.css" />
    <script src="../js/javascript.js"></script>
  </head>
  <body >
    <div class='container'>
      <div class='row1'></div>
    </div>
    <div class="navigator">
      <div class="divlogo">
        <img class="logo" src="../images/logo.png" alt="/" />
      </div>
      <nav>
        <ul class="menulista">
          <li onclick='vratiNaStranicu("../index.php")'>
            <a>Home</a>
          </li>
          <li onclick='vratiNaStranicu("../pages/about1.html")'>
            <a>About Us</a>
          </li>
          <li onmouseover="showMenu()" onmouseout="hideMenu()" onclick='vratiNaStranicu("./pages/products1.html")'>
            <a>Products</a>
            <ul id="menu" style="display:none" onmouseover="showMenu()">
              <li onclick='vratiNaStranicu("pages/products/oranges.html")'>Oranges</li>
              <li onclick='vratiNaStranicu("pages/products/apples.html")'>Apples</li>
              <li onclick='vratiNaStranicu("pages/products/onions.html")'>Onions</li>
              <li onclick='vratiNaStranicu("pages/products/potatoes.html")'>Potatoes</li>
            </ul>
          </li>
          <li onclick='otvori("pages/summary1.html")'>
            <a>Summary</a>
          </li>
          <li onclick='otvori("pages/contact1.php")'>
            <a>Contact Us</a>
          </li>
          <li onclick='otvori("pages/news.php")'>
            <a>News</a>
          </li>
          <li onclick='vratiNaStranicu("../pages/news2.php")'>
            <a>News (5. Spirala)</a>
          </li>
          <!--href='pages/news2.php'-->
        </ul>
      </nav>
    </div>
<div id="sadrzaj" class="sadrzaj">
<h2 class='komentar_zaglavlje'>NEWS</h2>
<?php
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
								 "<a href='mailto:'>Email: ".$komentar['email']."</a>".
				 "<p>Tekst: ".$komentar['tekst']."</p>";
   }
				
	}
	 }else{
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest order by vrijeme desc");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
	  foreach ($rezultat as $vijest) {
				  print "<div class='jedna_novost'>";
				  print "<h1>".$vijest['naslov']."</h1>".
						"<small>Posted ".date("d.m.Y. (h:i)", $vijest['vrijeme2'])." by ".$vijest['autor']."</small>".
						"<p>".$vijest['tekst']."</p>";
						$rezultatKomentari = $veza->query("SELECT COUNT(*) FROM komentar WHERE vijest= ".$vijest['id']);
				   print "<a href='../pages/novost.php?id=".$vijest['id']."'>".$rezultatKomentari->fetchcolumn()." komentara</a>";
				   print "</div>";//
	 }
		 
   }
?>
<br />
</div>
<footer class="footer">Copyright &reg Haris Spahic 2015
    <p class="validator">
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" />
      </a>
    </p></footer>
  </body>
</html>
