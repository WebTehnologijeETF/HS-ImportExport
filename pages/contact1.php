<div id="forma">
        <label>* required field</label>
    <form action="pages/contact_error.php" method="post" class="form">
    <table class="contakttabela">
        
        <tr><td><label>*Name:</label></td><td>  <input type="text" name="name" id="name" placeholder="Haris Spahic">
		
		</td></tr>
		<tr><td><label>Phone:</label></td><td> <input type="tel" name="phone" id="phone" placeholder="1234567"></td></tr>
        <tr><td><label>*Email:</label></td><td> <input type="text" name="email" id="email" placeholder="mail@example.com" value=""></td></tr>
		<tr><td><label>*Repeat email:</label></td><td> <input type="text" name="remail" id="remail" placeholder="mail@example.com" value=""></td></tr>
        <tr><td><label>Country:</label></td><td><input type="text" name="country" id="subject" value="Bosnia and Herzegovina" disabled></td></tr>
        <tr><td><label>*City:</label></td><td>  <input type="text" name="city" id="city" onkeyup="f()" ></td></tr>
        <tr><td><label>*Postal code:</label></td><td>
												<input type="text" name="postal" id="postal" onkeyup="f()" ></td></tr>
        <tr><td><label>*Comment:</label></td><td>
												 <textarea id="ta" name="textarea" placeholder="Write something to us"></textarea></td></tr>
    
    </table>
        <input id="submit_b" type="submit" name="dodavanje" value="Dodaj">
    </form>
        
        
    <footer class="footer">Copyright &reg; Haris Spahic 2015
		<p class="validator">
					<a href="http://jigsaw.w3.org/css-validator/check/referer">
						<img style="border:0;width:88px;height:31px"
							src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
							alt="Valid CSS!" />
						</a>
					</p></footer>
	</div>