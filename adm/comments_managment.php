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
                      <li><a href="news_managment.php" ><span>News managment</span></a></li>
					  <li><a href="comments_managment.php" class="current" ><span>Comments managment</span></a></li>
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
    <h1 class="dashboard">COMMENTS</h1>
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

		
		
		
		<?php

			if(isset($_REQUEST['delete'])){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("delete from komentar where id=".htmlEntities($_REQUEST['id_vijesti'])."");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}else{
					echo "<script type='text/javascript'>alert('Comment successfully deleted');</script>";
				}
			 }
		?>
		
		  
		
        </div>
      </div>

	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
	<?php
	if(true){
	$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, email from komentar order by vrijeme desc");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
				
				 print "<div class='portlet'>
							<div class='portlet-header fixed'><img src='images/icons/comments.gif' width='16' height='16' alt='Latest comments' /> Latest comments</div>
								<div class='portlet-content nopadding'>
						
						  <table width='100%' cellpadding='0' cellspacing='0' id='box-table-a' summary='Employee Pay Sheet'>
							<thead>
							  <tr>
								<th width='150' scope='col'>Text</th>
								<th width='150' scope='col'>Author</th>
								<th width='150' scope='col'>Email</th>
								<th width='150' scope='col'>Date</th>
								<th width='150' scope='col'>Options</th>
							  </tr>
							</thead><tbody>
							";
							$brojac=0;
	  foreach ($rezultat as $vijest) {
			  print "<tr><form action='?id=".$vijest['id']."' method='post'><td>".$vijest['tekst']."</td>"."<td>".$vijest['autor']."</td>"."<td>".$vijest['email']."</td>".
			  "<td>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</td>"."<td width='90'>
			  <input type='hidden' name='id_vijesti' value='".$vijest['id']."'>
			  <input type='submit' name='delete' value='Delete'>
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
<?php
		include("../adm/inc/adm_footer.php");
	?>
</body>
</html>
