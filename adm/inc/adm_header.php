<div class="grid_8" id="logo">HS Export-Import: Website Administration</div>
<div class="grid_8">

  <div id="user_tools"><span>Welcome <a href="#" name="user_" id="username_"><?php
  if(isset($_SESSION['username'])){
	  print $_SESSION['username'];
  }else{
	  print '';
  }
  
  ?></a></span>  |  <form action="/hs-importexport/adm/login.php" method="post"><input type="submit" name="logout" value="Logout"></form></div>
</div>

<div class="grid_16" id="header">

<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="/hs-importexport/" class="main current"><span class="outer"><span class="inner dashboard">Return to home</span></span></a></li>
               
    </ul>
	<?php
		include("../adm/quote.php");
	?>
</div>

</div>
