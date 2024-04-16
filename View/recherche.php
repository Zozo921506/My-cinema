<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Style/recherche.css">
    <title> Recherche </title>
</head>
<body>
    <nav>
        <h1 id = "title"> <a href = "./cinema.php"> My cinema </a> </h1>
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
                <li>
                    <a href = "./connexion.php"> Connexion </a>
                </li>
            </ul>
        </div>
    </nav>
    <section>
        <h3> Votre recherche </h3>
        <form id = "search">
            <input type = "text" name = "submit">
            <button type = "submit" value = "Search"> Search </button>
        </form>
        <?php
        $connect = new mysqli("localhost", "Zozo921506", "tf-rK4a3", "cinema");
        if ($connect -> connect_error)
        {
            die ("Connexion impossible:". $connect -> connect_error);
        }
        $search = $_REQUEST["submit"];
        $first = 0;
        $film_per_page = 100;
        $total = $connect -> query("SELECT * FROM movie
        INNER JOIN distributor ON movie.id_distributor = distributor.id 
        INNER JOIN movie_genre ON movie.id = movie_genre.id_movie 
        INNER JOIN genre ON id_genre = genre.id 
        WHERE title LIKE '%$search%' 
        OR distributor.name LIKE '%$search%'
        OR genre.name LIKE '%$search%' 
        OR movie.release_date LIKE '%$search%'
        ORDER BY movie.title");
        $nb_rows = $total -> num_rows;
        $nb_pages = ceil($nb_rows / $film_per_page);
        if (isset($_GET['num-page'])) 
        {
            $page = $_GET['num-page'];
            $first = ($page - 1) * $film_per_page;
        }

        $recherche = $connect -> query("SELECT * FROM movie
        INNER JOIN distributor ON movie.id_distributor = distributor.id 
        INNER JOIN movie_genre ON movie.id = movie_genre.id_movie 
        INNER JOIN genre ON id_genre = genre.id 
        WHERE title LIKE '%$search%' 
        OR distributor.name LIKE '%$search%'
        OR genre.name LIKE '%$search%' 
        OR movie.release_date LIKE '%$search%'
        ORDER BY movie.title LIMIT $first, $film_per_page");
        $films = $recherche -> fetch_all(MYSQLI_ASSOC);
        if (!empty($films)) 
        {
            echo "<p> <i>Résultat de votre recherche pour '$search'</i> </p>";
            foreach ($films as $film) 
            {
                echo "<div class='film'> <strong><i>$film[title]</i></strong> </div>";
            }

            echo "<div class = 'pagination'>";
            if ($nb_pages > 1) 
            {
                for ($i = 1; $i <= $nb_pages; $i++) 
                {
                    echo "<a href = '?num-page=$i&submit=$search'> $i </a>";
                }
            }
            echo "</div>";
        } 
        else 
        {
            echo "<p> Aucun résultat trouvé. </p>";
        }
    ?>
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