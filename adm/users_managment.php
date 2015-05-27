<!DOCTYPE html>
<html><head>
<meta charset="UTF-8" />
<title>Dashboard | Modern Admin</title>
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
                      <li><a href="news_managment.php"><span>News managment</span></a></li>
					  <li><a href="comments_managment.php" ><span>Comments managment</span></a></li>
                      <li><a href="users_managment.php" class="current"><span>Users managment</span></a></li>            
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>
 

<!-- CONTENT START -->
    <div class="grid_16" id="content">
   <!-- CONTENT TITLE -->
    <div class="grid_9">
    <h1 class="content_edit">USERS</h1>
    </div>
    <!-- CONTENT TITLE RIGHT BOX -->
    <div class="grid_6" id="eventbox"><a href="#" class="inline_tip">Here would come a small tip of using this admin</a></div>
    <div class="clear">
    </div>
	
	
<!--    TEXT CONTENT OR ANY OTHER CONTENT START     -->
    <div class="grid_15" id="textcontent">
	<!--THIS IS A PORTLET-->
        <div class="portlet">
		<div class="portlet-header">Add a news</div>

		<div class="portlet-content">
		  
		</div>
        </div>
	
	<!--THIS IS A WIDE PORTLET-->
	<?php
	if(isset($_REQUEST['add_user']) && $_REQUEST['username']!='' && $_REQUEST['password']!='' && $_REQUEST['type']!='' && $_REQUEST['email']!=''){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("insert korisnici SET korisnik='".htmlEntities($_REQUEST['username'])."', sifra='".htmlEntities($_REQUEST['password']).
				"', tip='".htmlEntities($_REQUEST['type'])."', email='".htmlEntities($_REQUEST['email'])."'");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}else{
					echo "<script type='text/javascript'>alert('User successfully added');</script>";
				}
	}
	if(isset($_REQUEST['delete'])){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("delete from korisnici where id=".htmlEntities($_REQUEST['id_user'])."");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}else{
					echo "<script type='text/javascript'>alert('User successfully deleted');</script>";
				}
	}
	if(isset($_REQUEST['edit'])){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, korisnik, email, sifra, tip from korisnici where id=".htmlEntities($_REQUEST['id_user'])."");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
				foreach ($rezultat as $vijest) {
				print "<form id='form1' name='form1' method='post' action=''>
		    <label>Username:</label>
			<input type='text' name='username' id='username' class='smallInput' value='".$vijest['korisnik']."'>
		    <label>Password:</label>
			<input type='text' name='password' id='password' class='smallInput' value='".$vijest['sifra']."'>
			 <label>Email address:</label>
			<input type='text' name='email' id='email' class='smallInput' value='".$vijest['email']."'>
			  <label>Type(1=Admin,2=Editor):</label>
			<input type='text' name='type' id='type' class='smallInput' value='".$vijest['tip']."'>
			<br>
			<input id='change_button' name='change' type='submit' value='Save changes' >
			<input id='reset_button' name='reset' type='submit' value='Reset' >
		  </form><br>";
				}
			 }else{
				 print "<form id='form1' name='form1' method='post' action=''>
			<label>Username:</label>
			<input type='text' name='username' id='username' class='smallInput'>
		    <label>Password:</label>
			<input type='text' name='password' id='password' class='smallInput'>
			 <label>Email address:</label>
			<input type='text' name='email' id='email' class='smallInput'>
			  <label>Type(1=Admin,2=Editor):</label>
			<input type='text' name='type' id='type' class='smallInput'>
			 <br>
            <input type='submit' name='add_user' value='Add a user' >
			<input type='submit' name='change' value='Change' >			
		  </form><br>";
			 }
			 
			 
	if(true){
				$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, korisnik, email, sifra, tip from korisnici order by id");
				if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
				}
				print "<div class='portlet'>
        <div class='portlet-header fixed'><img src='images/icons/user.gif' width='16' height='16' alt='Latest Registered Users' /> Last Registered users | 1=admin,2=editor</div>
		<div class='portlet-content nopadding'>
        
          <table width='100%' cellpadding='0' cellspacing='0' id='box-table-a' summary='Employee Pay Sheet'>
            <thead>
              <tr>
                <th width='150' scope='col'>Username</th>
                <th width='150' scope='col'>Password</th>
                <th width='150' scope='col'>Email</th>
                <th width='150' scope='col'>Type</th>
              </tr>
            </thead><tbody>
            ";
			$brojac=0;
	  foreach ($rezultat as $vijest) {
		  print "<tr><form action='?id=".$vijest['id']."' method='post'><td>".$vijest['korisnik']."</td>
                <td>".$vijest['sifra']."</td>
                <td>".$vijest['email']."</td>
                <td>".$vijest['tip']."</td>
                <td width='90'>
				<input type='hidden' name='id_user' value='".$vijest['id']."'>
				<input type='submit' name='edit' value='Edit'>
				<input type='submit' name='delete' value='Delete'></td>
              </form></tr>";
	  }
	  print "</tbody></table></div></div>";
				
	}else{
		
	}
	?>
<!--  END #PORTLETS -->  
   </div>
    <div class='clear'> </div>
<!-- END CONTENT-->    
  </div>
<div class='clear'> </div>


		
        <!--Second hidden element called from the tip message right of the title-->
        <div class='hidden'>
			<div id='inline_example2' title="This is a modal" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from the second hidden element on this page.</strong></p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<?php
		include("../adm/inc/adm_footer.php");
	?>
</body>
</html>
