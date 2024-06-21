<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include "./nav.php";
// 1. Obtenir base de données

    $termeRecherche = $_POST["termeRecherche"];

// 2. Connecter à la BD

    include "./exercice_film.php/config.php";

    try{
        //essayer de se connecter
        $cnx = new PDO (DSN, USERNAME, PASSWORD);
    }
    catch(Exception $e){
        print("<h3>Un problème est survenu!</h3>");
        print("<img src='./img.jpg'>");
        die();
    }

// 3. Créer une requête

$sql = "SELECT * FROM film WHERE titre LIKE :termeRecherche";
 
// 4. Préparer la requête
$stmt = $cnx->prepare ($sql); // pbjet PDOStatement

// 5. Donner des valeurs aux paramètres
$stmt->bindValue(":termeRecherche", "%".$termeRecherche."%", PDO::PARAM_STR);

// 6. Lancer la requête
$stmt->execute();

// 7. Obtenir les données
$arrayFilms = $stmt->fetchAll(PDO::FETCH_ASSOC);



var_dump ($arrayFilms);
    ?>
</body>
</html>