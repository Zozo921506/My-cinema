<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Style/abonnement.css">
    <title> Abonnement </title>
</head>
<body>
    <nav>
        <h1 id = "title"> <a href = "./cinema.php"> My cinema </a> </h1>
        <div>
            <ul>
                <li> Abonnement </li>
                <li> 
                    <a href = "./seances.php"> Séance </a> 
                </li>
                <li> 
                    <a href = "./historique.php"> Historique </a>
                </li>
                <li id = "search">
                    <form method = "post" action = "recherche.php">
                        <input type = "text" name = "submit">
                        <button type = "submit" value = "Search"> Search </button>
                    </form>
                </li>
                <li>
                    <a href = "./connexion.php"> Connexion </a>
                </li>
            </ul>
        </div>
    </nav>
    <section>
        <h3 id = "sub"> Nos Abonnement </h3>
        <div id = "rank">
            <div>
                <h4> Grade </h4>
                <p><strong>Pass Day</strong></p>
                <p class = "Classic"><strong>Classic</strong></p>
                <p class = "VIP"><strong>VIP</strong></p>
                <p class = "GOLD"><strong>GOLD</strong></p>
            </div>
            <div>
                <h4> Description </h4>
                <p> Pass valable une journée </p>
                <p> Abonnement mensuel classique </p>
                <p> Le mois tout compris </p>
                <p> L'année complète </p>
            </div>
            <div>
                <h4> Prix </h4>
                <p> 15€ </p>
                <p> 40€ </p>
                <p> 60€ </p>
                <p> 500€ </p>
            </div>
            <div>
                <h4> Durée </h4>
                <p> 1 jour </p>
                <p> 1 mois </p>
                <p> 1 mois </p>
                <p> 1 an </p>
            </div>
            <div>
                <h4> Réduction </h4>
                <p> 10% </p>
                <p> 10% </p>
                <p> 50% </p>
                <p> 60% </p>
            </div>
        </div>
    </section>
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