<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: sklep.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Gameworld</title>
	
	<link rel="Stylesheet" type="text/css" href="style.css" />
	
</head>

<body>

<div id = "kontener">

		<a href = "index.php"><div id="baner">
		<h1>GameWorld.pl</h1>
		</div></a>
	
		<div id="lewy">
		
		
	
	
	
	

	
		</div>
	
		<div id="prawy">
		
		
		<form action="login.php" method="post">
	
		<br /><br /><br /><br />Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		
		
		<?php
		if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
		?>
		
		
		<br /><br /><input type="submit" value="Zaloguj się" /> <br /><br /><br /><br />
		
		

		
		<a href="register.php">REJESTRACJA - załóż konto ,aby dokonać zakupu !! </a>
	
	</form>
		
		
		</div>
	
	
		<div id="stopka">

		<h6>Kontakt: info@gameworld.pl</h6>
		
	</div>
	
	
	
	
	
	

</body>
</html>