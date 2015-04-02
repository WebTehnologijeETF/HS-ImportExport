
window.onload= function(){
    //document.body.style.backgroundColor = "red";
    document.getElementById('femailcb').style.display="none";
    
    
}
var cekirano=false;
function validacija(){
    var ime= document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var text = document.getElementById('ta').value;
    var femail= document.getElementById('femailcb').value;
    if(!provjeriIme(ime)){
        
        document.getElementById('name').style.background= "rgba(242, 158, 158, 0.58)";
        return false;
    }
    
    if(!provjeriEmail(email)){
        document.getElementById('email').style.background= "rgba(242, 158, 158, 0.58)";
        return false;
    }
    else{
        document.getElementById('email').style.background= "transparent";
    }
    
    
    if(cekirano){
        if(!provjeriEmail(femail)){
        document.getElementById('femailcb').style.background= "rgba(242, 158, 158, 0.58)";
        return false;
    }
    else{
        document.getElementById('femailcb').style.background= "transparent";
    }
    }
    
    
    if(!provjeriText(text)){
        document.getElementById('ta').style.background="rgba(242, 158, 158, 0.61)";
        return false;
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