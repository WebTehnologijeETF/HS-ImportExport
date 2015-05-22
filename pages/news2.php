
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
       print "<a href='pages/novosti.php?id=".$vijest['id']."'>".$rezultatKomentari->fetchcolumn()." komentara</a>";
	   print "</div>";
     }
	 
   }
    ?>
	<br>
	
	<footer class="footer">Copyright &reg; Haris Spahic 2015
		
		<p class="validator">
					<a href="http://jigsaw.w3.org/css-validator/check/referer">
						<img style="border:0;width:88px;height:31px"
							src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
							alt="Valid CSS!" />
						</a>
					</p></footer>