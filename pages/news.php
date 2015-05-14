

<?php
$dir=getcwd();

$files1 = scandir($dir."\\novosti");

foreach($files1 as $fajlovi){
	if($fajlovi !== "." && $fajlovi!=="..")
	{
		$linije= file("novosti/".$fajlovi);
		echo "<article class='tekstslika' >";
		echo "<div class='tekst'>
			<img src=".$linije[3]." alt='/'>
			<h5>".$linije[0]."</h5>"
			."<h5>".$linije[1]."</h5>"
			."<h2>".$linije[2]."</h2>";
			foreach($linije as $kljuc=>$vrijednost){
				if($kljuc>3){
					echo "<p>".$vrijednost."</p>";
				} 			
			}
			echo "</div>";
			
		echo "</article>";
		
	}	

}

?>
<!--
<article class="tekstslika" id="apples">
			
			<div class="tekst"><h2>Apples</h2>
				<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. A un Angleso it va semblar un simplificat Anasdasdasdasgles, emblar un simplificat Anasdasdasdasgles, emblar un simplificat Anasdasdasdasgles, emblar un simplificat Anasdasdasdasgles, emblar un simplificat Anasdasdasdasgles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del</p>
			</div>
			<div class="slika"><img src="images/products/apple_p.jpg" alt="/"></div>
		</article>

-->
