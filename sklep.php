<?php

	session_start();
	
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
		
		<table>
		
		<?php
		
		require_once "connect.php";

		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	
		if ($polaczenie->connect_error)
			{
			die ("Error: ".$polaczenie->connect_error);
			}	
			
			
				$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk ORDER BY id_gry ASC";
				
				
				
				
				if(isset($_POST['tytul']))
				{
				$tytul = $_POST['tytul'];
				
					switch ($tytul) {
				case '1':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY tytul ASC ";
				break;
				case '2':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY tytul DESC";
					break;
				
				}
					}
					
				if(isset($_POST['id_producenta']))
				{
				$id_producenta = $_POST['id_producenta'];
				
					switch ($id_producenta) {
				case '1':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY p.nazwa  ASC ";
				break;
				case '2':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY p.nazwa  DESC";
					break;
				
				}
					}
				
				if(isset($_POST['id_gatunek']))
				{
				$id_gatunek = $_POST['id_gatunek'];
				
					switch ($id_gatunek) {
				case '1':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE s.nazwa = 'RPG' ";
				break;
				case '2':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE s.nazwa = 'Akcja'  ";
					break;
				case '3':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE s.nazwa = 'Przygodowa' ";
					break;
					
				case '4':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE s.nazwa = 'Strzelanka' ";
					break;
					
				case '5':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE s.nazwa = 'Logiczna' ";
					break;
					
				case '6':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE s.nazwa = 'Wyscigi' ";
					break;
					
				case '7':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE s.nazwa = 'Symulacja' ";
					break;
				}
					}
					
				if(isset($_POST['premiera']))
				{
				$premiera = $_POST['premiera'];
				
					switch ($premiera) {
				case '1':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY premiera ASC ";
				break;
				case '2':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY premiera DESC";
					break;
				
				}
					}
					
				if(isset($_POST['id_platforma']))
				{
				$id_platforma = $_POST['id_platforma'];
				
					switch ($id_platforma) {
				case '1':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE l.nazwa = 'PC' ";
				break;
				case '2':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE l.nazwa= 'x360' ";
					break;
				case '3':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE l.nazwa = 'PS4' ";
					break;
				
				case '4':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE l.nazwa = 'PSP' ";
					break;
					
				case '5':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE l.nazwa = 'PS3' ";
					break;
				
				}
					}
					
				if(isset($_POST['id_jezyk']))
				{
				$id_jezyk = $_POST['id_jezyk'];
				
					switch ($id_jezyk) {
				case '1':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE j.nazwa = 'PL' ";
				break;
				case '2':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE j.nazwa = 'ENG' ";
					break;
					
				case '3':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE j.nazwa = 'GER' ";
					break;
				case '4':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				WHERE j.nazwa = 'POR' ";
					break;
				
				}
					}
					
				if(isset($_POST['cena']))
				{
				$cena = $_POST['cena'];
				
					switch ($cena) {
				case '1':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY cena ASC ";
				break;
				case '2':
					$sql = "SELECT g.*, 
				p.nazwa as producent_nazwa ,
				s.nazwa as gatunek_nazwa,
				l.nazwa as platforma_nazwa,
				j.nazwa as jezyk_nazwa
				FROM GRY g 
				INNER JOIN producenci p ON g.id_producenta = p.id_producenta 
				INNER JOIN gatunki s ON g.id_gatunek = s.id_gatunku 
				INNER JOIN platformy l ON g.id_platforma = l.id_platformy
				INNER JOIN jezyki j ON g.id_jezyk = j.id_jezyk
				ORDER BY cena DESC";
					break;
					}
					}
				
				if($rezultat = $polaczenie->query($sql))
				{
					
					if( $rezultat->num_rows > 0)
					
					{
					
					echo "<tr>";
					echo "<td>ID</td>";
					echo "<td>Tytul</br>
					<form action = ' ' method = 'post'>
							<select name= 'tytul'>
							<option></option>
							<option value = '1'>A-Z</option>
							<option value = '2'>Z-A</option>
							</select></br>
							
							<input type='submit' name='sortuj' value = 'sortuj'/>
							</form>
						</td></td>  ";

					echo "<td>Producent</br>
					<form action = ' ' method = 'post'>
							<select name= 'id_producenta'>
							<option></option>
							<option value = '1'>A-Z</option>
							<option value = '2'>Z-A</option>
							</select></br>
							
							<input type='submit' name='sortuj' value = 'sortuj'/>
							</form>
						</td></td>  ";

					
						
					echo "<td>Gatunek</br>
					<form action = ' ' method = 'post'>
							<select name= 'id_gatunek'>
							<option></option>
							<option value = '1'>RPG</option>
							<option value = '2'>Akcja</option>
							<option value = '3'>Przygodowa</option>
							<option value = '4'>Strzelanka</option>
							<option value = '5'>Logiczna</option>
							<option value = '6'>Wyścigi</option>
							<option value = '7'>Symulacja</option>
							</select>
							
							<input type='submit' name='sortuj' value = 'sortuj'/>
							</form>
						</td></td>  ";
					
					
					echo "<td>Premiera</br>
					<form action = ' ' method = 'post'>
							<select name= 'premiera'>
							<option></option>
							<option value = '1'>Rosnaco</option>
							<option value = '2'>Malejaco</option>
							</select>
							
							<input type='submit' name='sortuj' value = 'sortuj'/>
							</form>
						</td></td>  ";

					
					
					echo "<td>Platforma</br>
					<form action = ' ' method = 'post'>
							<select name= 'id_platforma'>
							<option></option>
							<option value = '1'>PC</option>
							<option value = '2'>x360</option>
							<option value = '3'>PS4</option>
							<option value = '4'>PSP</option>
							<option value = '5'>PS3</option>
							
							</select>
							
							<input type='submit' name='sortuj' value = 'sortuj'/>
							</form>
						</td></td>  ";
					
					echo "<td>Jezyk</br>
					<form action = ' ' method = 'post'>
							<select name= 'id_jezyk'>
							<option></option>
							<option value = '1'>PL</option>
							<option value = '2'>ENG</option>
							<option value = '3'>GER</option>
							<option value = '4'>POR</option>
							
							</select>
							
							<input type='submit' name='sortuj' value = 'sortuj'/>
							</form>
						</td></td>  ";
					

					echo "<td>Cena</br>
					<form action = ' ' method = 'post'>
							<select name= 'cena'>
							<option></option>
							<option value = '1'>Rosnaco</option>
							<option value = '2'>Malejaco</option>
							</select>
							
							<input type='submit' name='sortuj' value = 'sortuj'/>
							</form>
						</td></td>  ";
					
					echo "<td>Dostepna liczba</br></td>";
						
						
					echo "</tr>";
					
					
					while($wiersz = $rezultat->fetch_assoc())
					{
		
					echo "<tr>";
					echo "<td>" . $wiersz["id_gry"] . "</td>";
					echo "<td>" . $wiersz["tytul"] . "</td>";
					echo "<td>" . $wiersz["producent_nazwa"] . "</td>";
					echo "<td>" . $wiersz["gatunek_nazwa"] . "</td>";
					echo "<td>" . $wiersz["premiera"] . "</td>";
					echo "<td>" . $wiersz["platforma_nazwa"] . "</td>";
					echo "<td>" . $wiersz["jezyk_nazwa"] . "</td>";
					echo "<td>" . $wiersz["cena"] ." zł". "</td>";
					echo "<td>" . $wiersz["ilosc"]  ." szt". "</td>";
					echo "<tr>";
			
	
					
					}
				}
			$polaczenie->close();
			}
		
		
		
		?>
	
		</tr>
		</table>
		</div>
	
		<div id="prawy">
		<?php

		echo "<p>Witaj ".$_SESSION['user'].'</p>';
	
		
	
		?>
		<a href= "logout.php"><input type='submit' value="Wyloguj sie"/></a>
		
		</div>
	
	
		<div id="stopka">
		
		<h6>Kontakt: info@gameworld.pl</h6>
		</div>
	</div>

</body>
</html>