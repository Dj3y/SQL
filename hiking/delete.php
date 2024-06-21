<?php
    include("assets/php/dbconnect.php");
    if(isset($_GET['idH'])){
        $idHiking = htmlspecialchars($_GET['idH']);
        echo $idHiking;
        $delete = $pdo->prepare("DELETE FROM `hiking`
                                 WHERE id = ?");
        $delete->execute([$idHiking]);
        header("Location: ./read.php");
        exit;
    }
?>