<?php
$connect = new mysqli("localhost", "Zozo921506", "tf-rK4a3");
if ($connect -> connect_error)
{
    die ("Connexion impossible:". $connect -> connect_error);
}
$connect -> close();
?>
<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Style/cinema.css">
    <title> Création de compte </title>
</head>
<body>
    <nav>
    <h1 id = "title"> <a href = "./cinema.php"> My cinema </a> </h1>
    </nav>
    <div id = "formulaire">
        <div class = "formulaire">
            <p> Nom </p>
            <input type = "text">
        </div>
        <div class = "formulaire">
            <p> Prénom </p>
            <input type = "text">
        </div>
        <div class = "formulaire">
            <p> Mail </p>
            <input type = "text">
        </div>
        <div class = "formulaire">
            <p> Tel </p>
            <input type = "text">
        </div>
        <div class = "formulaire">
            <p> Mot de passe </p>
            <input type = "password">
        </div>
        <div class = "formulaire">
            <p> Confirmer Mot de passe </p>
            <input type = "password">
        </div>
        <div>
            <button type = "submit" value = "Envoyer" id = "submit"> Envoyer </button>
        </div>
    </div>
    <footer>
        <div id = "footer">
            <div>
                <h3 class = "underline"> NOUS CONTACTER </h3>
                <p> +33 6 67 23 75 86 </p>
                <p class = "underline"> contact@mycinema.com </p>
                <p class = "underline"> support@mycinema.com </p>
            </div>
            <div>
                <h3 class = "underline"> COMMENTAIRES </h3>
                <p> Salle agréable et bien entretenue </p>
                <p> Siège confortable </p>
                <p> Personnel compétent </p>
            </div>
            <div>
                <h3 class = "underline"> RESEAUX SOCIAUX </h3>
                <p class = "underline"> mycinema.facebook </p>
                <p class = "underline"> mycinema.twitter </p>
                <p class = "underline"> mycinema.snapchat </p>
                <p class = "underline"> mycinema.instagram </p>
            </div>
        </div>
    </footer>
</body>
</html>