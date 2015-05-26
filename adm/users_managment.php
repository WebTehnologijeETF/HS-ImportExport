<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    	<!--LOGO-->
	<div class="grid_8" id="logo">HS Export-Import: Website Administration</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span>Welcome <a href="#">Admin Username</a>  |  <input type="button" value="Logout"></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="#" class="main current"><span class="outer"><span class="inner dashboard">Panel</span></span></a></li>
               
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="news_managment.php"><span>News managment</span></a></li>
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
		  <form id="form1" name="form1" method="post" action="">
			<label>Username:</label>
			<input type="text" name="naslov_novosti" id="naslov_novosti" class="smallInput">
		    <label>Password:</label>
			<input type="text" name="naslov_novosti" id="naslov_novosti" class="smallInput">
			 <label>Email address:</label>
			<input type="text" name="naslov_novosti" id="naslov_novosti" class="smallInput">
			  <label>Type(Admin,Editor..):</label>
			<input type="text" name="naslov_novosti" id="naslov_novosti" class="smallInput">
			 <br>
            <input type="button" name="reset" value="Add a user" >
			<input type="button" name="reset" value="Change" >			
		  </form>
		  <p>&nbsp;</p>
		</div>
        </div>
	
	<!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        <div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="150" scope="col">Username</th>
                <th width="150" scope="col">Password</th>
                <th width="150" scope="col">Email</th>
                <th width="150" scope="col">Type</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                
                <td>admin</td>
                <td>****</td>
                <td>admin@admin.com</td>
                <td>admin</td>
                <td width="90"><a href="#" class="approve_icon" title="Approve"></a> <a href="#" class="reject_icon" title="Reject"></a> <a href="#" class="edit_icon" title="Edit"></a> <a href="#" class="delete_icon" title="Delete"></a></td>
              </tr>
            </tbody>
          </table>
        </form>
		</div>
      </div>   
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>


		
        <!--Second hidden element called from the tip message right of the title-->
        <div class='hidden'>
			<div id='inline_example2' title="This is a modal" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from the second hidden element on this page.</strong></p>
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
