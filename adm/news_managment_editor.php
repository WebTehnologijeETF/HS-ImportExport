<?php 
session_start();
if (!isset($_SESSION['username'])){
	header("Location: /hs-importexport/adm/login.php");
}
include '../opt/opt.php';
?>

<!DOCTYPE html>
<html> 
<head> 
	<meta charset="UTF-8" />
	<title>Dashboard | Admin</title>
	<link rel="stylesheet" type="text/css" href="css/960.css" />
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/text.css" />
	<link rel="stylesheet" type="text/css" href="css/green.css" />
	<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
	<script src="js/javascript.js"></script>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
		
<?php

include("../adm/inc/adm_header.php");

?>




<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="news_managment_editor.php" class="current"><span>News managment</span></a></li>  
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
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		<div class="portlet-header">Add a news</div>

		<div class="portlet-content">
		
		
		<?php 
		
			
			if(isset($_REQUEST['publish']) && $_REQUEST['naslov_novosti']!='' && $_REQUEST['textarea']!='' ){
				
				$veza = new PDO($c_string, $root, $pass);
				$veza->exec("set names utf8");
				
				$timestamp = date('Y-m-d G:i:s');
		   $ubacivanje = $veza->query("insert vijest SET vrijeme='$timestamp', naslov='".htmlEntities($_REQUEST['naslov_novosti'],ENT_QUOTES).
		   "', tekst='".htmlEntities($_REQUEST['textarea'],ENT_QUOTES).
		   "', autor='".$_SESSION['username']."'");
		   if (!$ubacivanje) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
			}
			if(isset($_REQUEST['delete'])){
				
				$veza = new PDO($c_string, $root, $pass);
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
				$veza = new PDO($c_string, $root, $pass);
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
				 print "<form id='form5' name='form1' method='post' action='#'>
		    <label>Title</label>
		     <input type='text' name='naslov_novosti' id='naslov_novosti1' class='smallInput' />
            <label>Text</label>
		    <textarea name='textarea' cols='45' rows='3' class='smallInput' id='textarea1'></textarea>
			<br>
            <input id='publish_button1' name='publish' type='submit' value='Publish' >
			<input id='reset_button1' name='reset' type='submit' value='Reset' >
			
		  </form>";
			 }
				if(isset($_REQUEST['change'])){
				
				
				$veza = new PDO($c_string, $root, $pass);
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
		<?php
				$veza = new PDO($c_string, $root, $pass);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, email from komentar order by vrijeme desc");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
				$brojac=0;
				foreach ($rezultat as $vijest) {
					if(++$brojac == 6) break;
					print "<p class='info' id='info'><span class='info_inner'>'".$vijest['tekst']." by ".$vijest['autor'] ."'</span></p>";
				}
		
		?></div>
       </div>                             
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
	<?php
	include '../opt/opt.php';
				
				
	if(true){
				$veza = new PDO($c_string, $root, $pass);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest where autor='".$_SESSION['username']."' order by vrijeme desc");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}

				print "<div class='portlet'><div class='portlet-header fixed'><img src='images/icons/edit.gif' width='16' height='16'
				  alt='Latest Registered Users' /> Latest news</div>
		<div class='portlet-content nopadding'>
        
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
            ";
				$brojac=0;
	  foreach ($rezultat as $vijest) {
			  print "
              <tr><form action='?id=".$vijest['id']."' method='post'><td>".$vijest['naslov']."</td>"."<td>".$vijest['tekst']."</td>"."<td>".$vijest['autor']."</td>".
			  "<td>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</td>"."<td width='90'>
			  <input type='hidden' name='id_vijesti' value='".$vijest['id']."'>
			  <input type='submit' name='edit' value='Edit'>
			  <input class='za_admin' type='submit' name='delete' value='Delete'>
			  </td></td></form></tr>";
	 }
	 print "</tbody></table></div></div>";
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

</div>
<!-- WRAPPER END -->
<?php
		include("../adm/inc/adm_footer.php");
	?>
</body>
</html>
