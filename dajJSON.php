<?php
header('Content-type: text/javascript');
/*$json=array(
'succes'=>false,
'result'=>0
);*/
$pretraga= $_GET['upit'];
$json=array();
$dbh= new PDO("mysql:dbname=sampledb;host=mysql:3306/", "userGPJ", "c0odgnr25dURIfBh");
		$sql = 'SELECT username,password FROM login ORDER BY username';
    foreach ($dbh->query($sql) as $row) {
		$fname=$row['username'];
		if($pretraga=='')
		{
			array_push($json,$fname);
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false)
		{
			array_push($json,$fname);
		}
	}

//$stack = array("orange", "banana");
//array_push($stack, "apple", "raspberry");

echo json_encode($json);
//header('Location: LoginAdministrator.php');
?>
