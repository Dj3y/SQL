<?php
require_once("assets/php/dbconnect.php");
if(isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])){
    $name = htmlspecialchars($_POST['name']);
    $difficulty = htmlspecialchars($_POST['difficulty']);
    $distance = htmlspecialchars($_POST['distance']);
    $duration = htmlspecialchars($_POST['duration']);
    $height_difference = htmlspecialchars($_POST['height_difference']);
	
    $stmt = $pdo->prepare("INSERT INTO `hiking`( `name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES (:nameHiking, :difficulty, :distance, :duration, :height_difference)");
    $stmt->bindParam(':nameHiking', $name, PDO::PARAM_STR);
    $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_STR);
    $stmt->bindParam(':distance', $distance, PDO::PARAM_INT);
    $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
    $stmt->bindParam(':height_difference', $height_difference, PDO::PARAM_INT);
    $stmt->execute();
    
    $msg = "La randonnée a été ajoutée avec succès.";
    echo $msg;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>