<?php
$passError='';
$passEqual='';
$firstNameError='';
$lastNameError='';
$emailError='';
$nameError='';
if(isset($_POST['login'])){
$username =preg_replace('/[^A-Za-z]/','',$_POST['username1']);
$email=$_POST['email1'];
$password=$_POST['password2'];
$c_password=$_POST['password3'];
$first_name=$_POST['first-name1'];
$last_name=$_POST['last-name1'];
$birthday=$_POST['birthday'];
//testiranje gresaka
$greskaPostoji=false;
$bezGreske=true;
if(file_exists('users/' . $username . '.xml')){
	$greskaPostoji=true;
	$bezGreske=false;
}

//validacija
	if (!preg_match("/^[a-zA-Z0-9]+$/",$username)) {
				$nameError = "Samo slova i brojevi u username-u"; 
			}		
			
	if(strlen($password)<7)
	{
		$passError='Password mora imati više od 6 karaktera';
	}
	else if(strlen($password)>20)
	{
		$passError='Password mora imati manje od 20 karaktera';
	}
	else if(!preg_match("/[0-9]/",$password)) 
	{
		$passError='Password mora imati makar jedan broj';
	}
	if(!$password==$c_password) {$passEqual='Sifre se ne podudaraju';}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$first_name)) {
				$nameError = 'Samo slova i brojevi u imenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$last_name)) {
				$firstNameError = 'Samo slova i brojevi u prezimenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$email)) {	$emailError = 'E-mail treba biti u formatu ime@provajder.domena'; 
			}
	
	if($nameError=='' && $lastNameError=='' && $passEqual=='' && $passError=='' && $firstNameError==''  && $emailError=='' && !$bezGreske)
	{
if($bezGreske){
	$xml= new SimpleXMLElement('<user></user>');
	$xml->addChild('username',$username);
	$xml->addChild('password',md5($password));
	$xml->asXML('users/'.$username.'.xml');
	header('Location:login.php');
	die;
}
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
				 <?php if($nameError) echo '<p>$firstNameError</p>'; 
				 ?>
		    </li>
		    <li>
		    	<label>Last name:</label>
		    	<input type="text" name="last-name1" id="last-name1" onkeyup="validationLastName1()"required>
				 <?php if($lastNameError) echo '<p>$lastNameError</p>'; 
				 ?>
		    </li>
		    <li>
		    	<label>Email:</label>
		    	<input type="text" name="email1" id="email1" onkeyup="validationEmail1()" required>
				 <?php if($emailError) echo '<p>$emailError</p>'; 
				 ?>
		    </li>
		    <li>
		    	<label>Date of birth:</label>
		    	<input type="date" name="birthday" id="birthday" onkeyup="validationBrirthday()" required>
		    </li>
			<li>
		    	<label>Username:</label>
		    	<input type="text" name="username1" id="username1" onkeyup="validationUsername1()" required>
				 <?php if($nameError) echo '<p>$nameError</p>'; 
				 ?>
			</li>
			<li>
		    	<label>Password:</label>
		    	<input type="password" name="password2" id="password2" onkeyup="validationPassword1()" required>
				 <?php if($passError) echo '<p>$pasError</p>'; 
				 ?>
		    </li>
			<li>
		    	<label>Confirm Password:</label>
		    	<input type="password" name="password3" id="password3" onkeyup="validationPassword2()" required>
				 <?php if($passEqual) echo '<p>$passEqual</p>'; 
				 ?>
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