<?php
$error =false;
	if(isset($_POST['submitContact'])){
		$first_name =$a = htmlEntities($_POST['first-name'], ENT_QUOTES);
		$lst_name =$a = htmlEntities($_POST['last-name'], ENT_QUOTES);
		$usrname =$a = htmlEntities($_POST['email'], ENT_QUOTES);
		$message =$a = htmlEntities($_POST['message'], ENT_QUOTES);
		//validacija
		$firstNameError='';
		$usernameError='';
		$lastNameError='';
	if (!preg_match("/^[a-zA-Z0-9]+$/",$first_name)) {
				$firstNameError = 'Samo slova i brojevi u imenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$lst_name)) {
				$lastNameError = 'Samo slova i brojevi u prezimenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$usrname)) {
				$usernameError = 'Samo slova i brojevi u username-u'; 
			}
			if($firstNameError=='' && $lastNameError=='') 
			{
			//ContactMessages folder
			
		$xml= new SimpleXMLElement('<message></message>');
		$xml->addChild('first_name',$first_name);
		$xml->addChild('last_name', $last_name);
		$xml->addChild('usrname',$usrname);
		$xml->addChild('message',$message);
		$broj= rand (1,32000);
		if(!file_exists('ContactMessages/' . $broj . '.xml')){
			$xml->asXML('ContactMessages/'.$broj.'.xml');
		}
		// dodaj u bazu
		$dbh= new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "milan", "Prazina1");
		//u bazu korisnike  
	$stmt = $dbh->prepare("INSERT INTO poruka (username, poruka) VALUES (:name, :value)");
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':value', $value);

	// insert one row
	$name = $usrname;
	$value = $message;
	$stmt->execute();
		
		
		header('Location:index.php');
		die;
		$error=true;
			}
	}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Arsenal FC</title>
    <meta charset=utf-8>
	<link rel="stylesheet" type="text/css" href="style/contact.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>

  <body>  
	<script src="validationContact.js"></script>
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
     <form class="contact_form" action="#" method="post" name="contact_form">
  		<ul>
		    <li>
		    	<label>First name:</label>
		    	<input type="text" name="first-name" id="first-name" onkeyup="validationNameContact()" required>
		    </li>
		    <li>
		    	<label>Last name:</label>
		    	<input type="text" name="last-name" id="last-name" onkeyup="validationLastNameContact()" required>
		    </li>
		    <li>
		    	<label>Username:</label>
		    	<input type="text" name="email" id="email" onkeyup="validationNameContact()" required>
		    </li>
		    <li>
		    	<label>Message:</label>
		    	<textarea name="message" id="message" cols="35" rows="10" required></textarea>
		    </li>
		    <li>
		    	<button class="submit" type="submit" id="submitContact" name="submitContact" onmouseenter="smjestiUStorageKontakt()">Send message</button>
		    </li>
		</ul>

	</form>
	<SCRIPT src = "hambutton.js" ></SCRIPT>
  </body>
</html>