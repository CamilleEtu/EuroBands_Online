<?php
session_start();
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=eurobands', 'root', '');

$requete = 'SELECT * FROM artiste WHERE id_artiste =' . $_GET['id'];
$resultats = $bdd->query($requete);
$tableauArt = $resultats->fetchAll();
$resultats->closeCursor();
$nbArt = count($tableauArt);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/styleArtiste.css" />
    <title>EuroBands - Page d'Artiste</title>
</head>

<body>
    <header>
        <?php
        include './header.php';
        ?>
    </header>

    <div class="container_artiste">

        <?php
        for ($i = 0; $i < $nbArt; $i++) {
            echo '<h1 class="titre_accueil">' . $tableauArt[$i]['prenom_artiste'] . ' ' . $tableauArt[$i]['nom_artiste'] . '</h1>';
            echo '<p class="description_artiste">' . $tableauArt[$i]['bio_artiste'] . '</p1>';
        }
        ?>
    </div>


    <footer>
        <?php
        include './footer.php';
        ?>
    </footer>
</body>

</html>