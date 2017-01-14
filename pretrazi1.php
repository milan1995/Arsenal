<?php
$output='';
	if(isset($_POST['searchVal'])){
		$pretraga = htmlEntities($_POST['searchVal'], ENT_QUOTES);
		//ovdje nešto
		//ovo dodaje u autput u vajl
		//ovo vadi sve registrovane
		/*$files=glob('registration/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$fname=$xml->first_name;
		$lname=$xml->last_name;
		$fullName=$fname.' '.$lname;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false || strpos(strtolower($fullName),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
	}
	*/
	$dbh= new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "milan", "Prazina1");
	$sql = 'SELECT ime,prezime FROM registracija';
    foreach ($dbh->query($sql) as $row) {
		$fname=$row['ime'];
		$lname=$row['prezime'];
		$fullName=$fname.' '.$lname;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false || strpos(strtolower($fullName),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
		
	}
}
echo $output;
?>