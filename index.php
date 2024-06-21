<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    include "./nav.php";
    ?>

    <h1  class="text-primary">Bienvenue!</h1>
    <!-- Afficher la liste des films -->
    <?php
    // 1. Connecetr à la base de données

    include "./exercice_film.php/config.php";
    $cnx = new PDO (DSN, USERNAME, PASSWORD);

    // 2. Créer la requête

    $sql = "SELECT * FROM film ORDER BY id DESC LIMIT 3";

    // 3. Préparer la requête

    $stmt = $cnx -> prepare ($sql);

    // 4. Lancer la requête

    $stmt->execute();

    // 5. Obtenir le résultat dans le film  
    // et le mettre dans un array

    $arrayFilms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 6. Afficher les données

    // var_dump($arrayFilms);

    print("<ul>");
    foreach($arrayFilms as $film){
        print("<hr>");
        print("<li>Titre: " . $film['titre'] . "</li>");
        print("<li>Description: " . $film['description'] . "</li>");
        print("<li>Duree: " . $film['duree'] . "</li>");
        print("<img src='./uploads/" . $film['image'] . "'>");
    };
    print("</ul>");
    ?>
</body>
</html>