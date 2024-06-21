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
        include "./nav.php"
    ?>



    <h1>Tapez les données du film</h1>
    <form action="./filmInsererTraitement.php" method="POST" enctype="multipart/form-data" >
        <div>
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" >
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" >
        </div>
        <div>
            <label for="duree">Durée</label>
            <input type="number" id="duree" name="duree" >
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" >
        </div>
        <div>
            <input type="submit" value="Envoyer" >
        </div>
    </form>
</body>
</html>