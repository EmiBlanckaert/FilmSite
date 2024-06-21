<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
        var_dump($_POST);
        var_dump($_FILES);

        //Upload le fichier

        // 1. Créer un nom unique
        $dossier = "./uploads";
        $nomfichier = uniqid() . date('h-i-s') . $_FILES['image']['name'];

        $cheminComplet = $dossier . "/" . $nomfichier;

        
        // 1. Obtenir les données du formulaire
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $duree = $_POST['duree'];
        $image = $_FILES['image'];
        
        // 2. Déplacer le fichier 

        move_uploaded_file($_FILES['image']['tmp_name'], $cheminComplet);

        print($cheminComplet);

        // die();
       
        // 2. Connecter à la BD (PDO)
        include "./exercice_film.php/config.php";
 
        try{
            // essayer de connecter
            $cnx = new PDO (DSN, USERNAME, PASSWORD);
        }
        catch (Exception $e){
            // problème de connexion!!
            // instructions à suivre en cas de
            // problème de connexion
            print ("<h3>Un problème est survenu</h3>");
            print ("<img src='./image.jpg'>");
            print ("<a href='./accueil.php'>Accueil</a>");
 
            // var_dump ($e->getMessage());
            die();
        }
 
        // 3. Créer une requête du type INSERT
        $sql = "INSERT INTO film (id, titre, description, duree, image) VALUES (null, :titre, :description, :duree, :image)";
 
        // 4. Préparer la requête
        $stmt = $cnx->prepare ($sql); // pbjet PDOStatement
 
        $stmt->bindValue(":titre", $titre);
        $stmt->bindValue(":description", $description);
        $stmt->bindValue(":duree", $duree);
        $stmt->bindValue(":image", $nomfichier);
 
        // 5. Lancer la requête
        $stmt->execute();
 
        // var_dump ($stmt->errorInfo());
        // var_dump ($cnx->errorInfo());
    ?>
</body>
</html>