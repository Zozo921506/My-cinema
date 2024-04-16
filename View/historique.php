<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Style/historique.css">
    <title> Historique </title>
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
                <li> Historique </li>
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
        <h3> Historique des films visionnés </h3>
        <form>
            <input type = "text" name = "historique">
            <button type = "submit" value = "Search"> Search </button>
        </form>
        <?php
        $connect = new mysqli("localhost", "Zozo921506", "tf-rK4a3", "cinema");
        if ($connect -> connect_error)
        {
            die ("Connexion impossible:". $connect -> connect_error);
        }
        $search = $_REQUEST["historique"];
        $first = 0;
        $film_per_page = 20;
        $total = $connect -> query("SELECT DISTINCT * FROM movie 
        INNER JOIN membership_log ON movie.id = membership_log.id_session 
        INNER JOIN membership on membership_log.id_membership = membership.id 
        INNER JOIN user ON membership.id_user = user.id 
        WHERE user.firstname LIKE '$search' OR user.lastname LIKE '$search'");
        $nb_rows = $total -> num_rows;
        $nb_pages = ceil($nb_rows / $film_per_page);
        if (isset($_GET['num-page'])) 
        {
            $page = $_GET['num-page'];
            $first = ($page - 1) * $film_per_page;
        }

        $recherche = $connect -> query("SELECT DISTINCT * FROM movie 
        INNER JOIN membership_log ON movie.id = membership_log.id_session 
        INNER JOIN membership on membership_log.id_membership = membership.id 
        INNER JOIN user ON membership.id_user = user.id 
        WHERE user.firstname LIKE '$search' OR user.lastname LIKE '$search' LIMIT $first, $film_per_page");
        $films = $recherche -> fetch_all(MYSQLI_ASSOC);
        if (!empty($films))
        {
            echo "<p> Historique de l'abonné $search </p>";
            foreach ($films as $film)
            {
                echo "<div class = 'flex'>
                    <div class = 'film'> <strong><i>$film[title]</i></strong> </div>";
                    ?>
                    <form method = 'post' action  = ''>
                        <input type = 'hidden' value = '<?php $membership = $film['id_membership'];
                        echo $membership; ?>' name = 'hidden_membership'>
                        <button type = 'submit' value = 'Delete' name = 'Delete'> Supprimer </button>
                    </form>
                </div>
                <?php
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
        ?>
        <div id = 'add'>
                <form method = 'post' action = ''>
                    <input type = 'text' name = 'Ajouter'></input>
                    <button type = 'submit' value = 'Search' name = 'submit'> Search </button>
                </form>
            </div>
        <?php
        $search_add = $_REQUEST['Ajouter'];
        $liste_films = $connect -> query("SELECT * from movie WHERE title LIKE '%$search_add%' ORDER BY title");
        $liste_films -> fetch_all(MYSQLI_ASSOC);
        if ($search_add != "")
        {
            foreach ($liste_films as $liste_film)
            {
                echo "<div class = 'film'> <strong><i>$liste_film[title]</div>";
                ?>
                 <form method ='post' action =''>
                    <input type = 'hidden' value = '<?php echo $liste_film['id']; ?>' name = 'hidden_movie'>
                    <button type = 'submit' value = 'Ajouter' name = 'submit_add'> Ajouter </button>
                </form>
                <?php
            }
        }


        if (isset($_POST['submit_add'])) 
        {
            $id_movie = $_POST['hidden_movie'];
            if (!empty($membership) && !empty($id_movie)) 
            {
                $add = $connect -> query("INSERT INTO membership_log(id_membership, id_session) VALUES('$membership', '$id_movie')");
                echo "Film ajouté à l'historique avec succès!";
            } 
            else 
            {
                echo "Erreur lors de l'ajout du film à l'historique.";
            }
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