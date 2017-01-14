<?php
$output='';
	if(isset($_POST['submitSearch'])){
		$pretraga = htmlEntities($_POST['search'], ENT_QUOTES);
		//ovdje nešto
		//ovo dodaje u autput u vajl
		//ovo vadi sve registrovane
		$files=glob('registration/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$fname=$xml->first_name;
		$lname=$xml->last_name;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8>
	<title>Arsenal FC</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>

  <body>
	<script src="validationLogin.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript">
	function searchq(){
		var searchTxt = $("input[name='search']").val();
	$.post("pretrazi.php",{searchVal: searchTxt},function(output){
		$("#output").html(output);
	}
	);
	}
	</script>
	<script type="text/javascript">
	function prikaziSve(){
		var searchTxt = $("input[name='search']").val();
	$.post("pretrazi1.php",{searchVal: searchTxt},function(output){
		$("#output").html(output);
	}
	);
	}
	</script>
	</script>
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
    <form action="search.php" method="post" >
	<input type="text" name="search" onkeyup="searchq();" ;">
	<input type="button" name="submitSearch" value="&gt;&gt;" onclick="prikaziSve();">
		</form>
		<div id="output">
		</div>
	<SCRIPT src = "hambutton.js" ></SCRIPT>
  </body>
</html>