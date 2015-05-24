 
var cekirano=false;
var uspjesno=false;
function promjeniboju(el){
}

function showMenu(){
   document.getElementById("menu").style.display="inline-block";
   document.getElementById("menu").style.clear="both";
    
    
 }
 function hideMenu(){
   document.getElementById("menu").style.display="none";
 }


function validacija(){
	
	
	
    var ime= document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var text = document.getElementById('ta').value;
	
    var femail= document.getElementById('femailcb').value;
	
	
    
    if(!provjeriIme(ime)){
        document.getElementById('name').style.background= "rgba(242, 158, 158, 0.58)";
        return false;
    }
	else{
		document.getElementById('name').style.background= "transparent";	
	}
    if(!provjeriEmail(email)){
        document.getElementById('email').style.background= "rgba(242, 158, 158, 0.58)";
        return false;
    }
    else{
        document.getElementById('email').style.background= "transparent";
    }
    
    if(!uspjesno){
        document.getElementById("city").style.background = "rgba(242, 158, 158, 0.61)";
        document.getElementById("postal").style.background = "rgba(242, 158, 158, 0.61)";
        
        return false;
    }
    
    if(!provjeriText(text)){
        document.getElementById('ta').style.background="rgba(242, 158, 158, 0.61)";
        return false;
    }
    else{
        document.getElementById('ta').style.background="transparent";
    }
    
    
        
    return true;
    
}

function provjeriIme(i)
{
    if(i=="" || i==null)
        return false;
    
    document.getElementById('name').style.background= "transparent";
    return true;
}
function provjeriText(t)
{
    if(t=="" || t==null)
        return false;
    document.getElementById('ta').style.background= "transparent";
    return true;
}


function provjeriEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function kliknuto(cb){
    if(cb.checked == 1){
        document.getElementById('femailcb').style.display="block";
        cekirano=true;
    }
    else{
        document.getElementById('femailcb').style.display="none";        
    }
    
}


//-----------Provjera servisa ---------------//
function f(){
	
var grad = document.getElementById("city");
var pbroj = document.getElementById("postal");
var OK= '{"ok":"Poštanski broj odgovara mjestu"}';
var nepostojiBroj = '{"greska":"Nepostojeći poštanski broj"}';
var nepostojiGrad = '{"greska":"Nepostojeće mjesto"}';
var ajax = new XMLHttpRequest();
    
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200)
			if(ajax.responseText === OK){
				grad.style.background = "rgba(148, 229, 148, 0.45)";
				pbroj.style.background="rgba(148, 229, 148, 0.45)";
                uspjesno=true;
                
			}		
			else if(ajax.responseText === nepostojiGrad){
				
				grad.style.background = "rgba(242, 158, 158, 0.61)";
                uspjesno=false;
                
				}
			else{
				grad.style.background = "rgba(148, 229, 148, 0.45)";
				pbroj.style.background = "rgba(242, 158, 158, 0.61)";
                uspjesno=false;
			}
	}
	ajax.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto="+grad.value+"&postanskiBroj="+pbroj.value, true);
	ajax.send();
}

function otvori(stranica){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200)
			document.getElementById("sadrzaj").innerHTML = ajax.responseText;
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";
	}
	ajax.open("GET", stranica, true);
	ajax.send();
}
function vratiNaStranicu(stranica){
	window.open(stranica, window);
}
