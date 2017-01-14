xhr = new XMLHttpRequest();
function ucitaj(meni) {
  var storage;
  xhr.onreadystatechange =
  function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("main").innerHTML = xhr.responseText;
      if (storage== 'kontakt') storageKontakt();
      else if (storage=='registracija') storageRegistracija();
      else if (storage=='login') storageLogin();
    }
  }
  var url;
  switch(meni) {
    case 'pocetna':
      url= "pocetna.html";
      break;
    case 'novosti':
      url= "news.html";
      break;
    case 'tim':
      url= "first_team.html";
      break;
    case 'tabela':
      url= "league_table.html";
      break;
    case 'historija':
      url= "history.html";
      break;
    case 'kontakt':
      url= "contact.html"; storage='kontakt';
      break;
	  case 'registracija':
	  url='registration.html'; storage='registracija';
	  break;
	  case 'login':
	  url='login.html'; storage='login';
	  break;
	  
  }

  xhr.open("GET", url, true);
  xhr.send();
}
