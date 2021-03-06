<?php
session_start ();
if (!isset($_SESSION['username']) or !isset($_SESSION['password'])) {
header ('location: ./espace_enseignant.php');
exit();
}

require_once "../include/util.inc.php";
require_once "../include/fonctions.inc.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>profs et secretaires</title>
<meta charset="UTF-8"/>

<link rel="stylesheet" href="style.css" />




<style>
	.photosTable{
		background-color: white;
		border: 2px solid #fefbd8;
		font-weight: bold;
		font-style: italic;
		color: #570342;
		font-size: 15pt;
		text-align: center;
		width: 30%;
		margin: auto;
	}
	fieldset{
		margin-left:10%;
		margin-right:10%;
		border: 1px solid black;
	}
	section{
		background-color: white;
		width:90%;
		margin:auto;
		box-shadow: 3px 3px 3px #000;
	}
	input[type="search"]{
		width: 300px;
		height: 30px;
		font-size: 18px;
		line-height: 30px;
		padding: 8px 12px;
		border: 2px solid #ccc;
		border-radius: 8px;
	}
	input[type="search"]:focus{
		border-bottom-color: dodgerblue;
	}
	input[type="submit"]{
		height: 30px;
		line-height: 30px;
		border-radius: 8px;
		border-color: black;
		font-weight: bold;
	}
	input:required{
		background: url(../images/asterisk.png) right center no-repeat transparent;
	}
	input:focus:valid{
		border-bottom-color: green;
		background: url(../images/valid.png) right center no-repeat transparent;
	}
	input:focus:invalid{
		border-bottom-color: red;
		background: url(../images/invalid.png) right center no-repeat transparent;
	}
	legend{
		background-color: #fefbd8; 
		border: 1px solid black;
		font-weight: bold;
	}
	label{
		padding: 3px;
		border-radius: 600px 100px 100px 300px;
		border-color: white;
		background-color: #80ced6;
	}
	h2{
 		color: black;
 		text-align: center;
 		font-size: 26pt;
 		padding:1%;

	}
	h3{
		color: #570342;
		margin-left: 50px;
	}
	.listeForm li {
		display: inline-block;
		list-style-type: none;
		width: 30%;
	}
</style>
</head>
<body>
<header>

			<h1 style="text-align:center ; color:white">Espace professeurs et sécritaires</h1>
	
			<nav> 	
			<ul class="menu">	
				<li><a href="../index.html">Accueil</a></li>
				<li><a href="./logout.php">Déconnexion</a></li>
			</ul>
		</nav>
</header>

<section class="formProf">
	<h2>Afficher un trombinoscope :</h2>
	<?php 
	$infos = get_name_surname("../gestionnaire/dataProf.csv",$_SESSION['username']);
	if($infos == null){
		$infos = get_name_surname("../gestionnaire/dataSecret.csv",$_SESSION['username']);
	}
		echo "<p>Bienvenue, <strong>".$infos["nom"]." ".$infos["prénom"]."</strong></p>";
	?>
		<form class='formArbo' method="post" action="trombinoscopes.php">
		<fieldset>
		<legend>Accès par groupe de TD</legend>
		<table style='margin-left:10%'>		
		<tr>
		<td style='width:50%'>
		<label class="labelId" for="groupe">Filière :</label>
		</td>
		<td><select name='groupe' id="groupe">
			<?php liste_option("../gestionnaire/arborescence",0); ?>
		</select>
		</td>
		

		<tr>
		<td>
		<label class="labelId" for="format">Format :</label>
		</td>
		<td>
		<select style="margin-left: 1%;" name='format' id="format">
			<option>4</option>
			<option>3</option>
			<option>2</option>
		</select>
		</td>
		</tr>
		</table>
		<input type="submit" name="afficher" value="Afficher" class="bouttonConnexion">
		</fieldset>
	</form>

</section>
<?php
	echo footerConnexionEtudiant();
?>
