<?php
$output='';
	if(isset($_POST['searchVal'])){
		$pretraga = htmlEntities($_POST['searchVal'], ENT_QUOTES);
		//ovdje nešto
		//ovo dodaje u autput u vajl
		//ovo vadi sve registrovane
		$files=glob('registration/*.xml');
		$brojac=1;
	/*foreach($files as $file){
		if($brojac>10) break;
		$xml=new SimpleXMLElement($file,0,true);
		$fname=$xml->first_name;
		$lname=$xml->last_name;
		$fullName=$fname.' '.$lname;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false || strpos(strtolower($fullName),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		
	}*/
	$dbh= new PDO("mysql:dbname=sampledb;host=mysql:3306/", "userGPJ", "c0odgnr25dURIfBh");
	$sql = 'SELECT ime,prezime FROM registracija';
    foreach ($dbh->query($sql) as $row) {
		if($brojac>10) break;
		$fname=$row['ime'];
		$lname=$row['prezime'];
		$fullName=$fname.' '.$lname;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false || strpos(strtolower($fullName),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		
	}
}
echo $output;
?>
