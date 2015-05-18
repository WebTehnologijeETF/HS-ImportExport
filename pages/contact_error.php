
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HS_ImportExport - World of import & export</title>
</head>
<body>


<div id="sadrzaj" class="sadrzaj">	
<p>Proba</p>
		<div id="forma">
		<?php
				
		$name_="";
		$email;
		$remail;
		$comm;
		$nameError ="";
		$emailError ="";
		$repeatEmailError="";
		$comment="";
		
		if(isset($_REQUEST['submit'])){
			if (empty($_POST["name"])) {
			$nameError = "Name is required";
			}else{
				$name = test_input($_POST["name"]);
				// check name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z]*$/",$name)) {
				$nameError = "Only letters and white space allowed";
				}else{
					$name_=$name;
				}
			}
			echo $name_;
			if (empty($_POST["email"])) {
				$emailError = "Email is required";
			} else {
				$email = test_input($_POST["email"]);
				// check if e-mail address syntax is valid or not
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
				$emailError = "Invalid email format";
				}
			}
			if(empty($_POST["remail"])){
				$repeatEmailError="Repeat email is required";
			}else{
				if(strcmp($_POST["email"], $_POST["remail"]) !== 0){
					$repeatEmailError="Email adresses doesnt match";
				}
			}
			if (empty($_POST["textarea"])) {
				$comment = "Comment is required";
			} else {
				$comment = test_input($_POST["textarea"]);
			}
			
		}
		function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		
		
    ?>
        <label>Fields with "*" are required</label>
    <form action="contact_error.php" method="post" class="form">
    <table class="contakttabela">
        
        <tr><td><label>*Name:</label></td><td>  <input type="text" name="name" id="name" value="
		<?php
		if(isset($_REQUEST['$name_'])){
			echo $name_; 
		}
		?>
		
		">
		<br><span class="error"><?php echo $nameError;?> </span>
		</td></tr>
		<tr><td><label>Phone:</label></td><td> <input type="tel" name="phone" id="phone" placeholder="1234567"></td></tr>
        <tr><td><label>*Email:</label></td><td> <input type="text" name="email" id="email" placeholder="mail@example.com" value="">
		<br><span class="error"><?php echo $emailError;?></span>
		</td></tr>
		<tr><td><label>*Repeat email:</label></td><td> <input type="text" name="remail" id="remail" placeholder="mail@example.com" value="">
		<br><span class="error"><?php echo $repeatEmailError;?></span>
		</td></tr>
        <tr><td><label>Country:</label></td><td><input type="text" name="country" id="subject" value="Bosnia and Herzegovina" disabled></td></tr>
        <tr><td><label>*City:</label></td><td>  <input type="text" name="city" id="city" onkeyup="f()" ></td></tr>
        <tr><td><label>*Postal code:</label></td><td>
												<input type="text" name="postal" id="postal" onkeyup="f()" ></td></tr>
        <tr><td><label>*Comment:</label></td><td>
												 <textarea id="ta" name="text" placeholder="Write something to us"></textarea>
												 <br><span class="error"><?php echo $comment;?></span>
												 </td></tr>
    
    </table>
	<br>
        <input id="submit_b" type="submit" name="submit" value="Dodaj">
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


</body>

</html>
