<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./InscriptionTraitement.php" metho="POST">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" >

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>