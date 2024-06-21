<?php
    require_once("assets/php/dbconnect.php");
    $query = 'SELECT * FROM `hiking`';
    $array = $pdo->query($query)->fetchAll();
    // test pour voir si la requete fonctionne
    // echo '<pre>';
    // var_dump($array);
    // echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiking</title>
    <style>
        table{
            width: 80%;
        }
        table td{
            text-align: center;
        }
    </style>
</head>
<body>
    <header></header>
    <main>
        <h1>liste des randonnées</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Difficulty</th>
                <th>Distance</th>
                <th>Duration</th>
                <th>Height difference</th>
            </tr>
            <?php
                foreach($array as $arrays){
                    echo'<tr><td><a href="update.php?idH=' . $arrays[0] . '">' . $arrays[1] . '</a></td><td>' . $arrays[2] . '</td><td>' . $arrays[3] . ' km</td><td>' . $arrays[4] . '</td><td>' . $arrays[5] . ' m</td><td><a href="delete.php?idH=' . $arrays[0] . '">Supprimer</td></tr>';
                }
            ?>
        </table>
        <a href="create.php">Ajouter une randonnée</a>
    </main>
    <footer></footer>
</body>
</html>