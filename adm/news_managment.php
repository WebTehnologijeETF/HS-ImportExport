<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/green.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  

    <script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
    
  	<!--LOGO-->
	<div class="grid_8" id="logo">HS Export-Import: Website Administration</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span>Welcome <a href="#" name="user_">Admin Username</a>  |  <input type="button" value="Logout"></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="#" class="main current"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
               
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="news_managment.php" class="current"><span>News managment</span></a></li>
                      <li><a href="users_managment.php"><span>Users managment</span></a></li>         
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>
 

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="dashboard">NEWS</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">Bla bla - random quote!</a>
    	<div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET
		<div class="portlet">
            <div class="portlet-header"><img src="images/icons/chart_bar.gif" width="16" height="16" alt="Reports" /> Visitors - Last 30 days</div>
            <div class="portlet-content">
            <!--THIS IS A PLACEHOLDER FOR FLOT - Report & Graphs 
            <div id="placeholder" style="width:auto; height:250px;"></div>
            </div>
        </div>      
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		<div class="portlet-header">Add a news</div>

		<div class="portlet-content">
		
		
		<?php
			if(isset($_REQUEST['publish']) && $_REQUEST['naslov_novosti']!='' && $_REQUEST['textarea']!='' ){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				
				$timestamp = date('Y-m-d G:i:s');
		   $ubacivanje = $veza->query("insert vijest SET vrijeme='$timestamp', naslov='".htmlEntities($_REQUEST['naslov_novosti'],ENT_QUOTES).
		   "', tekst='".htmlEntities($_REQUEST['textarea'],ENT_QUOTES).
		   "', autor='admin'");
		   if (!$ubacivanje) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
			}
			if(isset($_REQUEST['delete'])){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("delete from komentar where vijest=".htmlEntities($_REQUEST['id_vijesti'])."");
				$rezultat = $veza->query("delete from vijest where id=".htmlEntities($_REQUEST['id_vijesti'])."");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}else{
					echo "<script type='text/javascript'>alert('News successfully deleted');</script>";
				}
			 }
			  if(isset($_REQUEST['edit'])){
				
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest where id=".htmlEntities($_REQUEST['id_vijesti'])."");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
				foreach ($rezultat as $vijest) {
				print "<form id='form1' name='form1' method='post' action=''>
		    <label>Title</label>
		     <input type='text' name='naslov_novosti' id='naslov_novosti' value='".$vijest['naslov']."' class='smallInput' />
            <label>Text</label>
		    <textarea name='textarea' cols='60' rows='10' class='smallInput' id='textarea' >".$vijest['tekst']."</textarea>
			<br>
			<input id='change_button' name='change' type='submit' value='Save changes' >
			<input id='reset_button' name='reset' type='submit' value='Reset' >
		  </form>";
				}
			 }else{
				 print "<form id='form1' name='form1' method='post' action=''>
		    <label>Title</label>
		     <input type='text' name='naslov_novosti' id='naslov_novosti' class='smallInput' />
            <label>Text</label>
		    <textarea name='textarea' cols='45' rows='3' class='smallInput' id='textarea'></textarea>
			<br>
            <input id='publish_button' name='publish' type='submit' value='Publish' >
			<input id='reset_button' name='reset' type='submit' value='Reset' >
			
		  </form>";
			 }
			if(isset($_REQUEST['change'])){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				
				$rezultat = $veza->query("update vijest set naslov='".htmlEntities($_REQUEST['naslov_novosti'])."', tekst='".htmlEntities($_REQUEST['textarea'])."' where id=".htmlEntities($_REQUEST['id'])."");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}else{
					echo "<script type='text/javascript'>alert('News successfully edited');</script>";
				}
				
			 }
		?>
		
		  
		  <p>&nbsp;</p>
		</div>
        </div>
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
      <!--THIS IS A PORTLET-->        
      <div class="portlet">
		<div class="portlet-header"><img src="images/icons/comments.gif" width="16" height="16" alt="Comments" />Latest Comments</div>

		<div class="portlet-content">
         <p class="info" id="success"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
    <p class="info" id="error"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
    <p class="info" id="warning"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
<p class="info" id="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
       </div>                             
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
	<?php
	if(true){
	$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest order by vrijeme desc");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
				$brojac=0;
	  foreach ($rezultat as $vijest) {
				  print "<div class='portlet'><div class='portlet-header fixed'><img src='images/icons/user.gif' width='16' height='16'
				  alt='Latest Registered Users' /> Latest news</div>
		<div class='portlet-content nopadding'>
        <form action='?id=".$vijest['id']."' method='post'>
          <table width='100%' cellpadding='0' cellspacing='0' id='box-table-a' summary='Employee Pay Sheet'>
            <thead>
              <tr>
                <th width='150' scope='col'>Title</th>
                <th width='150'9 scope='col'>Text</th>
                <th width='150' scope='col'>Author</th>
                <th width='150' scope='col'>Publish date</th>
				<th width='150' scope='col'>Options</th>
              </tr>
            </thead>
            <tbody>
              <tr>";
			  print "<td>".$vijest['naslov']."</td>"."<td>".$vijest['tekst']."</td>"."<td>".$vijest['autor']."</td>".
			  "<td>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</td>"."<td width='90'>
			  <input type='hidden' name='id_vijesti' value='".$vijest['id']."'>
			  <input type='submit' name='edit' value='Edit'>
			  <input type='submit' name='delete' value='Delete'>
			  </td></td></tr></tbody></table></form></div></div>";
	 }
	}else{
		print "<p>Nema nista</p>";
	}
	
	
	?>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
Copyright &reg Haris Spahic 2015</div>
<!-- FOOTER END -->
</body>
</html>
