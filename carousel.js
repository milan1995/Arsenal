var slikeIndex = 1;
PrikaziSliku(slikeIndex);

function PrikaziManje() {
  PrikaziSliku(slikeIndex =slikeIndex -1);
}
function PrikaziVise() {
  PrikaziSliku(slikeIndex =slikeIndex +1);
}

function OdaberiSliku(n) {
  PrikaziSliku(slikeIndex = n);
}

function PrikaziSliku(n) {
  var i;
  var slike = document.getElementsByClassName("Slike");
  //ne prikazuje se slika
  for (i = 0; i < slike.length; i++) {
      slike[i].style.display = "none"; 
  }
  if (n > slike.length) {slikeIndex = 1;} 
  if (n < 1) {slikeIndex = slike.length;}
  slike[slikeIndex-1].style.display = "block"; 
}