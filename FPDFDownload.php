<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(32,10,'Izvjestaj WT',1,0,'C');
	//Line break
    $this->Ln(20);
	//Subtitle
	$this->Cell(0,10,'Spisak korisnika',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$i=1;
/*$files=glob('users/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$pdf->Cell(0,10,'Korisnik broj '.$i.': '.$xml->username,0,1);
		$i=$i+1;
	}*/
	//uzmi sa baze umjesto XMl-a
	$dbh= new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "milan", "Prazina1");
		$sql = 'SELECT username,password FROM login ORDER BY username';
    foreach ($dbh->query($sql) as $row) {
		$pdf->Cell(0,10,'Korisnik broj '.$i.': '.$row['username'],0,1);
		$i=$i+1;
	}
	
$pdf->Output();
?>