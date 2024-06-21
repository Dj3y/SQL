<?php
    // * version MySQL
    // ! mysql_query() et mysql_fetch_assoc déprecié depuis PHP 5.5
    require("assets/php/dbconnect.php");

    $query = 'SELECT * FROM `météo`';
    $arr = $pdo -> query($query)->fetchAll();
    // test pour voir si la requete fonctionne
    // echo '<pre>';
    // var_dump($arr);  
    // echo '</pre>';
    $idVille = $_GET[''];
    if(isset($_POST['ville'])){
        $ville = htmlspecialchars($_POST['ville']);
        $haut = htmlspecialchars($_POST['max']);
        $bas = htmlspecialchars($_POST['min']);
        $stmt = $pdo->prepare('INSERT INTO `météo`(`ville`, `haut`, `bas`)
                VALUES (:ville, :haut, :bas)');
        $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
        $stmt->bindParam(':haut', $haut, PDO::PARAM_INT);
        $stmt->bindParam(':bas', $bas, PDO::PARAM_INT);
        $stmt->execute();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL</title>
</head>
<body>
   <form action="index.php" method="POST">
        <label for="ville">Entrer une ville</label>
        <input type="text" id="ville" name="ville"><br>
        <label for="max">Entrer la temperature maximal</label>
        <input type="text" id="max" name="max"><br>
        <label for="min">Entrer la temperature minimal</label>
        <input type="text" id="min" name="min">
        <button type="submit">Ajouter</button>
    </form>
    <form action="index.php" method="POST">
    <table>
        <tr>
            <th>ville</th>
            <th>haut</th>
            <th>bas</th>
            <th>supprimer</th>
        </tr>
            <?php
                foreach ($arr as $array) {  
                    $idVille = $array[0];
                      echo'<tr><td>'. $array[0] .'</td><td>'. $array[1] .'</td><td>'. $array[2] .'</td>
                      <td><input type="checkbox" id="'. $idVille . '">'. '</td></tr>';
                }
            ?>
    </table>
    <button>Supprimer</button>
    </form>
</body>
</html>