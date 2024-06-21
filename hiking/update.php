<?php
    require_once("assets/php/dbconnect.php");
    if(isset($_GET['idH']))
    {
        $idHiking = htmlspecialchars($_GET['idH']);
        $query = $pdo->prepare('SELECT * FROM `hiking` 
                  WHERE id =?;');
        $query->execute(array($idHiking));
        $array = $query->fetchAll();
    // test pour voir si la requete fonctionne
    // echo '<pre>';
    // var_dump($array);
    // echo '</pre>';
	}

	// Mise à jour de la DB
	if(isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])){
		$idHiking = htmlspecialchars($_GET['idH']);
		$nameEdit = htmlspecialchars($_POST['name']);
		$difficultyEdit = htmlspecialchars($_POST['difficulty']);
		$distanceEdit = htmlspecialchars($_POST['distance']);
		$durationEdit = htmlspecialchars($_POST['duration']);
		$heightEdit = htmlspecialchars($_POST['height_difference']);

		$exec = $pdo->prepare("UPDATE `hiking` 
							   SET `name` = ' $nameEdit ',
							   `difficulty` = ' $difficultyEdit ',
							   `distance` = ' $distanceEdit ',
							   `duration` = '$durationEdit ',
							   `height_difference` = '$heightEdit ' 
							   WHERE id = ' $idHiking '");
		$exec->execute();
		header("Location: ./update.php?idH=" . $idHiking);
        exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Modifier</h1>
	<?php 
		echo'<form action="update.php?idH=' . $idHiking . '" method="post">';
		foreach ($array as $key) {
			echo'<div>
				<label for="name">Name</label>
				<input type="text" name="name" value="'. $key['name'] . '">
			</div>

			<div>
				<label for="difficulty">Difficulté</label>
					<select name="difficulty">
						<option value="' . $key['difficulty'] . '">' . $key['difficulty'] . '</option>
						<option value="très facile">Très facile</option>
						<option value="facile">Facile</option>
						<option value="moyen">Moyen</option>
						<option value="difficile">Difficile</option>
						<option value="très difficile">Très difficile</option>
					</select>
				</div>
					
				<div>
					<label for="distance">Distance</label>
					<input type="text" name="distance" value="' . $key['distance'] . '">
				</div>
				<div>
					<label for="duration">Durée</label>
					<input type="duration" name="duration" value="' . $key['duration'] . '">
				</div>
				<div>
					<label for="height_difference">Dénivelé</label>
					<input type="text" name="height_difference" value=" '. $key['height_difference'] .' ">
				</div>
				<button type="submit" name="editer">Modifier</button>';
		}
	?>
	</form>
</body>
</html>