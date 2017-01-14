<!DOCTYPE html>
<?php
	if(isset($_GET['staviUCSV'])){
	$fp = fopen('LoginPodaci.csv', 'w');
	/*$files=glob('users/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$filer =array($xml->username,$xml->password);
			fputcsv($fp, $filer);
	}*/
	//bazno rješenje
	$dbh1= new PDO("mysql:dbname=sampledb;host=mysql:3306/", "userGPJ", "c0odgnr25dURIfBh");
		$sql1 = 'SELECT username,password FROM login ORDER BY username';
    foreach ($dbh1->query($sql1) as $row) {
		$filer =array($row['username'],$row['password']);
			fputcsv($fp, $filer);
	}
	
		fclose($fp);
		//header("Location: http://localhost:50/spiralatri/LoginPodaci.csv");
		$url = 'http://' . $_SERVER['HTTP_HOST'];            // Get the server
		$url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); // Get the current directory
		$url .= '/LoginPodaci.csv';            // <-- Your relative path
		header('Location: ' . $url, true, 302); 
		die();
	}
?>
<?php
session_start();
if(isset($_SESSION['username']))
	$logined=true;
else
	$logined=false;
$staviUCSV=false;
?>
<html>
  <head>
    <title>Arsenal FC</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
	<div class="header">
			<div class="logo"></div>
			<div class="main_menu">
              <ul class="topmenu" id="menu">
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="first_team.php">First Team</a></li>
  <li><a href="league_table.php">League Table</a></li>
  <li><a href="history.php">History</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="showMenu()">☰</a>
  </li>
</ul>
<a href="registration.php" class="login">login/register</a>
            </div>  
				
	</div>
	<h2>Welcome 
	<?php
	if($logined)
	echo $_SESSION['username'];
	?>
	</h2>
	<table>
	<tr>
	<th>Username</th>
	<th>Password</th>
	</tr>
	<?php
	$dbh= new PDO("mysql:dbname=sampledb;host=mysql:3306/", "userGPJ", "c0odgnr25dURIfBh");
		$sql = 'SELECT username,password FROM login ORDER BY username';
    foreach ($dbh->query($sql) as $row) {
		echo '
		<tr>
		<td>'.$row['username'].'</td>
		<td>'.$row['password'].'</td>
		</tr>';
	}
	/*
	$files=glob('users/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		echo '
		<tr>
		<td>'.$xml->username.'</td>
		<td>'.$xml->password.'</td>
		</tr>';
	}
	*/
	?>
	</table>
	<p><a href="LoginAdministrator.php?staviUCSV=true" style="background-color:white">Klikni za kreiranje i preuzimanje CSV fajla</a></p>
	<p><a href="FPDFDownload.php" style="background-color:white">Klikni za kreiranje izvještaja u PDF-u</a></p>
	<a href="changePassword.php" style="background-color:white">Change password</a>
	<a href="deleteUser.php" style="background-color:white">Delete User</a>
	<p><a href="uBazu.php" style="background-color:white">Stavi podatke iz XML-a u bazu</a></p>
	<p><a href="JSON.php" style="background-color:white">Klikni ovdje za JSON</a></p>
	<a href="logout.php" style="background-color:white">Logout</a>
	<SCRIPT src = "hambutton.js" ></SCRIPT>
	
  </body>
</html>
