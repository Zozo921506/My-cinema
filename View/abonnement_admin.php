<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Style/abonnement.css">
    <title> Abonnement Admin</title>
</head>
<body>
    <nav>
        <h1 id = "title"> <a href = "./cinema.php"> My cinema </a> </h1>
        <div>
            <ul>
                <li> Abonnement </li>
                <li> 
                    <a href = "./seances_admin.php"> Séance </a> 
                </li>
                <li> 
                    <a href = "./historique.php"> Historique </a>
                </li>
                <li>
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
        <div>
            <h3> Modification des grades </h3>
            <form>
                <input type = "text" name = "submit_user">
                <button type = "submit" value = "Search"> Search </button>
            </form>
            <?php
            $connect = new mysqli("localhost", "Zozo921506", "tf-rK4a3", "cinema");
            if ($connect -> connect_error)
            {
                die ("Connexion impossible:". $connect -> connect_error);
            }
            $search = $_REQUEST['submit_user'];
            $max_utilisateurs = 20;
            $nb_rows = $connect->query("SELECT COUNT(DISTINCT user.id) AS count FROM membership
            INNER JOIN subscription ON membership.id_subscription = subscription.id
            RIGHT OUTER JOIN user ON membership.id_user = user.id
            WHERE user.firstname LIKE '%$search%'
            OR user.lastname LIKE '%$search%'
            OR subscription.name LIKE '%$search%'")->fetch_assoc()['count'];
            $nb_pages = ceil($nb_rows / $max_utilisateurs);
            $page = isset($_GET['num-page']) ? $_GET['num-page'] : 1;
            $first = ($page - 1) * $max_utilisateurs;

            $recherche = $connect->query("SELECT DISTINCT * FROM membership
            INNER JOIN subscription ON membership.id_subscription = subscription.id
            RIGHT OUTER JOIN user ON membership.id_user = user.id
            WHERE user.firstname LIKE '%$search%'
            OR user.lastname LIKE '%$search%'
            OR subscription.name LIKE '%$search%' ORDER BY lastname LIMIT $first, $max_utilisateurs");
            $users = $recherche -> fetch_all(MYSQLI_ASSOC);
            if (!empty($users))
            {
                echo "<p> <i>Résultat de votre recherche pour '$search'</i> </p>";
                foreach ($users as $user)
                {
                    echo "<div class = 'user'>
                    <div class = 'flex'>
                    <p class = 'red'> <strong><i>$user[firstname] $user[lastname]</i></strong> </p> 
                    <p class = '$user[name]'> <strong><i>$user[name]</i></strong> </p>
                    </div>
                    <div class = 'block'>";
                    if (!$user['name']) 
                    {
                        ?>
                        <form method = 'post' action = ''>
                            <div class ='flex'>
                                <select name = 'Ajouter_Grade'>
                                    <option value = '4'> Pass Day </option>
                                    <option value = '3'> Classic </option>
                                    <option value = '1'> VIP </option>
                                    <option value = '2'> GOLD </option>
                                    <option value = '5'> DIAMOND </option>
                                </select>
                                <input type = 'hidden' value = '<?php echo $user['id']; ?>' name = 'hidden_id_add'>
                                <button type = 'submit' name = 'Ajouter' value = 'Ajouter'> Ajouter </button>
                            </div>
                        </form>
                        <?php
                    } 
                    else 
                    {
                        ?>
                        <div class = 'flex'>
                            <form method = 'post' action = ''>
                                <input type = 'hidden' value = '<?php echo $user['id']; ?>' name = 'hidden_id_delete'>
                                <button type = 'submit' value = 'Supprimer'> Supprimer </button>
                            </form>
                            <form method = 'post' action = ''>
                                <div class ='flex'>
                                    <select name = 'Modifier_Grade'>
                                        <option value = '4'> Pass Day </option>
                                        <option value = '3'> Classic </option>
                                        <option value = '1'> VIP </option>
                                        <option value = '2'> GOLD </option>
                                        <option value = '5'> DIAMOND </option>
                                    </select>
                                    <input type = 'hidden' value = '<?php echo $user['id']; ?>' name = 'hidden_id_modify'>
                                    <button type = 'submit' name = 'Modifier' value = 'Modifier'> Modifier </button>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                echo "<div class = 'pagination'>";
                for ($i = 1; $i <= $nb_pages; $i++) 
                {
                    echo "<a href = '?num-page=$i&submit=$search'> $i </a>";
                }
                echo "</div>";
            }

            $id_add = $_POST['hidden_id_add'];
            if (isset($id_add)) 
            {
                $subscribe = $_POST["Ajouter_Grade"];
                $add = $connect -> query("INSERT INTO membership(id_user, id_subscription, date_begin) 
                VALUES ('$id_add', '$subscribe', NOW())");
                if ($add) 
                {
                    echo "<p class = 'success'> Abonnement ajouté avec succès pour l'id $id_add </p>";
                } 
                else 
                {
                    echo "<p class = 'error'> Erreur lors de l'ajout de l'abonnement pour l'id $id_add </p>";
                }
            }
            
            $id_modify = $_POST['hidden_id_modify'];
            if (isset($id_modify)) 
            {
                $modif = $_POST["Modifier_Grade"];
                $modify = $connect -> query("UPDATE membership SET id_user = '$id_modify', id_subscription = '$modif', date_begin = NOW() 
                WHERE id_user = '$id_modify'");
                if ($modify) 
                {
                    echo "<p class = 'success'> Abonnement modifié avec succès pour l'id $id_modify </p>";
                } 
                else 
                {
                    echo "<p class = 'error'> Erreur lors de la modification de l'abonnement pour l'id $id_modify </p>";
                }
            }

            $id_delete = $_POST['hidden_id_delete'];
            if (isset($id_delete))
            {
                $id_member = "SELECT id FROM membership WHERE id_user = '$id_delete'";
                $delete_historic = $connect -> query("DELETE FROM membership_log 
                WHERE id_membership IN ($id_member)");
                $delete = $connect -> query("DELETE FROM membership WHERE id_user = '$id_delete'");
                if ($delete) 
                {
                    echo "<p class = 'success'> Abonnement supprimé avec succès pour l'id $id_delete </p>";
                } 
                else 
                {
                    echo "<p class = 'error'> Erreur lors de la suppression de l'abonnement pour l'id $id_delete </p>";
                }
            }
            mysqli_close($connect);
            ?>
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