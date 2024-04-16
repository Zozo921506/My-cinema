<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Style/cinema.css">
    <title> My Cinema </title>
</head>
<body>
    <nav>
        <h1 id = "title"> My cinema </h1>
        <div>
            <ul>
                <li> 
                    <a href = "./abonnement.php"> Abonnement </a> 
                </li>
                <li> 
                    <a href = "./seances.php"> Séance </a> 
                </li>
                <li> 
                    <a href = "./historique.php"> Historique </a>
                </li>
                <li id = "search">
                    <form method = "post" action = "./recherche.php">
                        <input type = "text" name = "submit">
                        <button type = "submit" value = "Search"> Search </button>
                    </form>
                </li>
                <li>
                    <a href = "./connexion.php"> Connexion </a>
                </li>
            </ul>
        </div>
        <section class = "Salles">
            <h3> Nos salles </h3>
            <div class = "images">
                <div class = "carousel-container">
                    <div class = "carousel-slide">
                        <img src = "../Image/salle_cinéma.jpg" alt = "Salle de cinéma" class = "image">
                    </div>
                    <div class = "carousel-slide">
                        <img src = "../Image/siège.jpg" alt = "Sièges de cinéma" class = "image">
                    </div>
                    <div class = "carousel-slide">
                        <img src = "../Image/siège2.jpg" alt = "Sièges de cinéma" class = "image">
                    </div>
                </div>
                <button class = "prev" id = "previous" > &lt; </button>
                <button class = "next" id = "next"> &gt; </button>
            </div>
        </section>
    </nav>
    <section class = "center">
        <h3> Nouveauté </h3>
        <div class = "display">
            <div>
                <p class = "movie"> <strong>Leap !</strong> </p>
                <img src = "../Image/leap.jpg" alt = "Leap!">
            </div>
            <div>
                <p class = "movie"> <strong>The Lost City of z</strong> </p>
                <img src = "../Image/The_Lost_City_of_Z.png" alt = "The Lost City of Z">
            </div>
            <div>
                <p class = "movie"> <strong>Collide</strong> </p>
                <img src = "../Image/Collide.jpg" alt = "Collide">
            </div>
            <div>
                <p class = "movie"> <strong>The Great Wall</strong> </p>
                <img src = "../Image/TheGreat.jpg" alt = "The Great Wall">
            </div>
            <div>
                <p class = "movie"> <strong>A Cure for Wellness</strong> </p>
                <img src = "../Image/a_cure_for_wellness.jpg" alt = "A Cure for Wellness">
            </div>
        </div>
    </section>
    <section class = "center">
        <h3> Films classiques </h3>
        <div class = "display">
            <div>
                <p class = "movie"> <strong>Spider-man</strong> </p>
                <img src = "../Image/spider-man.jpg" alt = "Spider-man">
            </div>
            <div>
                <p class = "movie"> <strong>Star Wars</strong> </p>
                <img src = "../Image/star-wars.webp" alt = "Star Wars">
            </div>
            <div>
                <p class = "movie"> <strong>Pirates of the Caribbean</strong> </p>
                <img src = "../Image/pirates-caraibes.jpeg" alt = "Pirate des Caraïbes">
            </div>
            <div>
                <p class = "movie"> <strong>Jurassic Park</strong> </p>
                <img src = "../Image/jurassic_park.webp" alt = "Jurassic Park">
            </div>
            <div>
                <p class = "movie"> <strong>Harry Potter</strong> </p>
                <img src = "../Image/harry-potter.jpg" alt = "Harry Potter">
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
    <script src = "../cinema.js"></script>
</body>
</html>