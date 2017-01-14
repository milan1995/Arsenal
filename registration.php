<?php
if(isset($_POST['login'])){
$username =preg_replace('/[^A-Za-z]/','',$_POST['username1']);
$email=htmlEntities($_POST['email1'], ENT_QUOTES);
$password = htmlEntities($_POST['password2'], ENT_QUOTES);
$c_password = htmlEntities($_POST['password3'], ENT_QUOTES);
$first_name= htmlEntities($_POST['first-name1'], ENT_QUOTES);
$last_name= htmlEntities($_POST['last-name1'], ENT_QUOTES);
$birthday= htmlEntities($_POST['birthday'], ENT_QUOTES);
//testiranje gresaka
$greskaPostoji=false;
$bezGreske=true;
if(file_exists('users/' . $username . '.xml')){
	$greskaPostoji=true;
	$bezGreske=false;
}
$passError='';
$nameError='';
$passEqual='';
$nameError='';
$firstNameError='';
$emailError='';
$lastNameError='';
$passError='';
	if (!preg_match("/^[a-zA-Z0-9]+$/",$first_name)) {
				$firstNameError = 'Samo slova i brojevi u imenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$last_name)) {
				$lastNameError = 'Samo slova i brojevi u prezimenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$username)) {
				$nameError = "Samo slova i brojevi u username-u"; 
			}		
			
	if(strlen($password)<7)
		{
		$passError='Password mora imati više od 6 karaktera';
		}
	else if(!preg_match("/[0-9]/",$password)) 
		{
		$passError='Password mora imati makar jedan broj';
		}
	if(!$password==$c_password) {$passEqual='Sifre se ne podudaraju';}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
		$emailError = 'E-mail treba biti u formatu ime@provajder.domena';
		} 
if($bezGreske && $nameError=='' && $firstNameError=='' && $lastNameError=='' && $passEqual=='' && $passError=='' && $emailError==''){
	$dbh= new PDO("mysql:dbname=sampledb;host=mysql:3306/", "userGPJ", "c0odgnr25dURIfBh");
	//registration folder
	/*$xml= new SimpleXMLElement('<user></user>');
	$xml->addChild('first_name',$first_name);
	$xml->addChild('last_name', $last_name);
	$xml->addChild('email',$email);
	$xml->addChild('birthday', $birthday);
	$xml->addChild('username',$username);
	$xml->addChild('password', md5($password));
	$xml->asXML('registration/'.$username.'.xml');
	*/
	//u bazu registrovane
	$stmt1 = $dbh->prepare("INSERT INTO registracija (username, ime, prezime, email, datum_rodjenja) VALUES (:username, :ime, :prezime, :email, :datum_rodjenja)");
	$stmt1->bindParam(':username', $user);
	$stmt1->bindParam(':ime', $ime1);
	$stmt1->bindParam(':prezime', $prez1);
	$stmt1->bindParam(':email', $email1);
	$stmt1->bindParam(':datum_rodjenja', $rodj);
	
	// insert one row
	$user = $username;
	$ime1=$first_name;
	$prez1=$last_name;
	$email1=$email;
	$rodj=$birthday;
	
	$stmt1->execute();
	
	//users folder
	/*$xml1= new SimpleXMLElement('<user></user>');
	$xml1->addChild('username',$username);
	$xml1->addChild('password',md5($password));
	$xml1->asXML('users/'.$username.'.xml');
	*/
	//u bazu korisnike  
	$stmt = $dbh->prepare("INSERT INTO login (username, password) VALUES (:name, :value)");
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':value', $value);

	// insert one row
	$name = $username;
	$value = md5($password);
	$stmt->execute();
	header('Location:login.php');
	die;
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8>
	<title>Arsenal FC</title>
	<link rel="stylesheet" type="text/css" href="style/register.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>

  <body>
	<script src="Registration.js"></script>
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
     <form class="registration_form" action="#" method="post" name="registration_form">
  		<ul>
		    <li>
		    	<label>First name:</label>
		    	<input type="text" name="first-name1" id="first-name1" onkeyup="validationName1()" required>
		    </li>
		    <li>
		    	<label>Last name:</label>
		    	<input type="text" name="last-name1" id="last-name1" onkeyup="validationLastName1()"required>
		    </li>
		    <li>
		    	<label>Email:</label>
		    	<input type="text" name="email1" id="email1" onkeyup="validationEmail1()" required>
		    </li>
		    <li>
		    	<label>Date of birth:</label>
		    	<input type="date" name="birthday" id="birthday" required>
		    </li>
			<li>
		    	<label>Username:</label>
		    	<input type="text" name="username1" id="username1" onkeyup="validationUsername1()" required>
			</li>
			<li>
		    	<label>Password:</label>
		    	<input type="password" name="password2" id="password2" onkeyup="validationPassword1()" required>
		    </li>
			<li>
		    	<label>Confirm Password:</label>
		    	<input type="password" name="password3" id="password3" onkeyup="validationPassword2()" required>
		    </li>
		    <li>
		    	<button class="submit" type="submit" name='login' id="login" onmouseenter="smjestiUStorageRegistration()">Register</button>
		    </li>
			<li>
				<a class="loginlink" href="login.php" id="loglink">Already registered? Click to login</a>
		    </li>
		</ul>

	</form>
  </body>
</html>
