function storageKontakt() {
    var ime= document.getElementById("first-name");
	var prezime= document.getElementById("last-name");
	var email= document.getElementById("email");
	var poruka= document.getElementById("message");
    var name = localStorage.getItem("first-name");
    if (name !== null) ime.value=name;
	var last_name = localStorage.getItem("last-name");
    if (name !== null) prezime.value=last_name;
	var mail = localStorage.getItem("email");
    if (name !== null) email.value=mail;
	var message1 = localStorage.getItem("message");
    if (name !== null)	poruka.value=message1;
    
}
function smjestiUStorageKontakt()
{
	var ime= document.getElementById("first-name");
	localStorage.setItem("first-name", ime.value);
	var prezime= document.getElementById("last-name");
	localStorage.setItem("last-name", prezime.value);
	var email= document.getElementById("email");
	localStorage.setItem("email", email.value);
	var poruka= document.getElementById("message");
	localStorage.setItem("message", poruka.value);
}
function validationNameContact()
{
	var ime =  document.getElementById("first-name");
	var reg = /^[a-zA-Z]+$/; 
	var dugme =  document.getElementById("submitContact");
	if(ime.value.match(reg))
	{
	ime.style.color = "black";
	dugme.disabled=false;
	ime.setCustomValidity("");
	}
	else
	{
		ime.style.color= "red";
		//dugme.disabled=true;
		ime.setCustomValidity('Unesite ispravno ime');
	}

}
function validationLastNameContact()
{
	var prezime= document.getElementById("last-name");
	var reg = /^[a-zA-Z]+$/;
	var dugme =  document.getElementById("submitContact");
	if(prezime.value.match(reg))
	{
		prezime.style.color= "black";
		dugme.disabled=false;
		prezime.setCustomValidity('');
	}
	else
	{
		prezime.style.color= "red";
		//dugme.disabled=true;
		prezime.setCustomValidity('Unesite ispravno prezime');
	}
}


function validationEmailContact()
{
	var dugme =  document.getElementById("submitContact");
	var email = document.getElementById("email");
	var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email.value.match(reg))
	{
		email.style.color= "black";
		dugme.disabled=false;
		email.setCustomValidity('');
	}
	else
	{
		email.style.color= "red";
		//dugme.disabled=true;
		email.setCustomValidity('E-mail u formatu naziv@provajder.domena');
	}
}