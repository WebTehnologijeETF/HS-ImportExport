<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="UTF-8" />
    <title>HS_ImportExport - World of import &amp; export</title>
    <link rel="stylesheet" type="text/css" href="css/stajl.css" />
    <script src="js/javascript.js"></script>
  </head>
  <body >
    <div class='container'>
      <div class='row1'></div>
    </div>
    <div class="navigator">
      <div class="divlogo">
        <img class="logo" src="images/logo.png" alt="/" />
      </div>
      <nav>
        <ul class="menulista">
          <li onclick='otvori("pages/index1.html")'>
            <a>Home</a>
          </li>
          <li onclick='otvori("pages/about1.html")'>
            <a>About Us</a>
          </li>
          <li onmouseover="showMenu()" onmouseout="hideMenu()" onclick='otvori("./pages/products1.html")'>
            <a>Products</a>
            <ul id="menu" style="display:none" onmouseover="showMenu()">
              <li onclick='otvori("pages/products/oranges.html")'>Oranges</li>
              <li onclick='otvori("pages/products/apples.html")'>Apples</li>
              <li onclick='otvori("pages/products/onions.html")'>Onions</li>
              <li onclick='otvori("pages/products/potatoes.html")'>Potatoes</li>
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
          <li onclick='vratiNaStranicu("pages/news2.php")'>
            <a>News (5. Spirala)</a>
          </li>
          <!--href='pages/news2.php'-->
        </ul>
      </nav>
    </div><?php

        echo "<script type='text/javascript'>".
           "otvori('pages/index1.html');".
           "</script>";

        ?>
    <div id="sadrzaj" class="sadrzaj">
	
	</div>
    <footer class="footer">Copyright &reg Haris Spahic 2015
    <p class="validator">
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" />
      </a>
    </p></footer>
  </body>
</html>
