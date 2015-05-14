
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HS_ImportExport - World of import & export</title>
<link rel="stylesheet" type="text/css" href="/hs-importexport/css/stajl.css">
</head>
<body>


<div id="sadrzaj" class="sadrzaj">	
		<div id="forma">
        <label>Fields with "*" are required</label>
    <form action="../pages/contact_proba.php" method="post" class="form">
    <table class="contakttabela">
        
        <tr><td><label>*Name:</label></td><td>  <input type="text" name="name" id="name" placeholder="Haris Spahic"></td></tr>
        <tr><td><label>*Email:</label></td><td> <input type="text" name="email" id="email" placeholder="mail@example.com" value=""></td></tr>
		<tr><td><label>*Repeat email:</label></td><td> <input type="text" name="remail" id="remail" placeholder="mail@example.com" value=""></td></tr>
        <tr><td><label>Country:</label></td><td><input type="text" name="country" id="subject" value="Bosnia and Herzegovina" disabled></td></tr>
        <tr><td><label>*City:</label></td><td>  <input type="text" name="city" id="city" onkeyup="f()" ></td></tr>
        <tr><td><label>*Postal code:</label></td><td>
												<input type="text" name="postal" id="postal" onkeyup="f()" ></td></tr>
        <tr><td><label>*Comment:</label></td><td>
												 <textarea id="ta" name="text" placeholder="Write something to us"></textarea></td></tr>
    
    </table>
	<br>
        <input id="submit_b" type="submit" name="dodavanje" value="Dodaj">
    </form>
        <br>
        
    
	</div>
<br>

	<!--<div class="mapa">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d367258.1339626932!2d17.830928507135614!3d44.017175197667164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sba!4v1427988695523"></iframe>
	</div>-->
	
<footer class="footer">Copyright &reg; Haris Spahic 2015
		<p class="validator">
					<a href="http://jigsaw.w3.org/css-validator/check/referer">
						<img style="border:0;width:88px;height:31px"
							src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
							alt="Valid CSS!" />
						</a>
					</p></footer>
</div>



<?php
		echo "Probni_php";
		if (isset($_REQUEST['name'])){
			echo "Ime je:".$_REQUEST['name'];
		}
		
		if (isset($_REQUEST['email'])){
			$email_a= $_REQUEST['email'];
			
			if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
			echo "This ($email_a) email address is considered valid.";
			}
	
		if (isset($_REQUEST['country'])){
				
			}
		if (isset($_REQUEST['city'])){
			
		}
		if (isset($_REQUEST['postal'])){
			
		}
		if (isset($_REQUEST['text'])){
			
		}
}
        ?>

</body>

</html>
