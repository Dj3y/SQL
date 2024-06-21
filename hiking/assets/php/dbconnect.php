<?php
    try {
        // On se connecte à MySQL
	    $pdo = new PDO('mysql:host=localhost;dbname=hiking;charset=utf8', 'root', '');
    }
    // affichage des erreurs
    catch(PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }

?>