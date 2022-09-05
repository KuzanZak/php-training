<?php
require "_functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 5</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 5</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link active" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

        <?php

        // Json file
        try {
            $fileContent = file_get_contents("datas/series.json");
            $series = json_decode($fileContent, true);
        } catch (Exception $e) {
            echo "Something went wrong with json file...";
            exit;
        }

        ?>

        <section class="exercice">
            Sur cette page un fichier comportant les données de séries télé est importé côté serveur. (voir datas/series.json)
            Les données sont accessibles dans la variable $series.
        </section>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis affichez l'ensemble des plateformes de diffusion des séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                <?php
                $platforms = [];
                foreach ($series as $serie) {
                    // if (!in_array($serie["availableOn"], $platforms)) $platforms[] = $serie["availableOn"];
                    $platforms[] = $serie["availableOn"];
                }
                // $platforms = array_map(fn ($s) => $s["availableOn"], $series);
                // $platforms = array_unique(array_map(fn ($s) => $s["availableOn"], $series));
                $platforms = array_unique($platforms);
                sort($platforms);
                echo getHtmlFromArray1($platforms);
                ?>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis affichez l'ensemble des styles de séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                <?php
                // var_dump($series);
                $styles = [];
                // foreach ($series as $serie) {
                //     foreach ($serie["styles"] as $style) {
                //         // if (!in_array($style, $styles)) $styles[] = $style;
                //         $styles[] = $style;
                //     }
                // }

                //------------------------------
                // foreach ($series as $serie) {
                //     $styles = array_merge($serie["styles"], $styles);
                // }


                // --------------------------------
                // $styles = array_map(fn ($s) => $s["styles"], $series);
                // $styles = array_merge(...$styles);
                // $styles = array_unique($styles);

                $styles = array_unique(array_merge(...array_map(fn ($s) => $s["styles"], $series)));
                sort($styles);
                // var_dump($styles);
                echo getHtmlFromArray1($styles);
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Afficher la liste de toutes les séries avec l'image principale, le titre, l'équipe de création et la liste des acteurs</p>
            <p class="exercice-txt">L'image et le titre de la série sont des liens menant à cette page avec en paramètre "serie", l'identifiant de la série</p>
            <p class="exercice-txt">Afficher une seule série par ligne sur les plus petits écrans, 2 séries par ligne sur les écrans intermédiaires et 4 séries par ligne sur un écran d'ordinateur.</p>
            <div class="exercice-sandbox">
                <ul class="list-principal">
                    <?php
                    // foreach ($series as $serie) {
                    //     $actors = getListFromArray($serie["actors"]);
                    //     $creators = getListFromArray($serie["createdBy"]);
                    //     echo "<li class =\"list\">
                    //     <a href= \"exo5.php?serie=" . $serie['id'] . "\" class = \"title\">" . $serie["name"] . "</a>
                    //     <a href=\"exo5.php?serie=" . $serie['id'] . "\"><img class = \"img\" src = \"" . $serie['image'] . "\"></a>
                    //     <ul class = \"created\"><span class =\"spanT\">Créé par : </span>$creators</ul>
                    //     <ul class =\"casting\"><span class =\"spanT\">Casting: </span>$actors</ul></li>";
                    // }

                    // ----------------------------------------------
                    function urlToSrc(string $url): string
                    {
                        return "<img class = \"img\" src = \"$url\">";
                    }
                    function getLink(string $string, int $id, string $classCSS = NULL): string
                    {
                        $link = "";
                        if ($classCSS) {
                            $link = "<a href=\"$string $id\" class = \"$classCSS\">";
                        } else {
                            $link = "<a href=\"$string $id\">";
                        }
                        return $link;
                    }
                    // function addToUrlImage(string $string, int $id): string
                    // {
                    //     return "<a href=\"$string $id\">";
                    // }
                    function addSpanOnHtml(): string
                    {
                        return "<span class =\"spanT\">";
                    }

                    foreach ($series as $serie) {
                        $actors = getListFromArray($serie["actors"]);
                        $creators = getListFromArray($serie["createdBy"]);
                        $image = urlToSrc($serie["image"]);
                        $urlTitle = getLink("exo5.php?serie=", $serie["id"], "title");
                        $urlImage = getLink("exo5.php?serie=", $serie["id"]);
                        $span = addSpanOnHtml();

                        echo "<li class =\"list\">
                        $urlTitle" . $serie["name"] . "</a>
                        $urlImage $image</a>
                        <ul class = \"created\">$span Créé par : </span>$creators</ul>
                        <ul class =\"casting\">$span Casting: </span>$actors</ul></li>";
                    }
                    ?>
                </ul>
            </div>
        </section>


        <!-- QUESTION 4 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série.</p>
            <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
            <div class="exercice-sandbox">
                <?php
                foreach ($series as $serie) {
                    if ($_GET["serie"] == $serie["id"]) {
                        $actors = implode(", ", $serie["actors"]);
                        $creators = implode(", ", $serie["createdBy"]);

                        echo "<p>Id : " . $serie["id"] . "</p>
                        <p>Name : " . $serie["name"] . "</p>
                        <p>Year : " . $serie["launchYear"] . "</p>
                        <p>Country : " . $serie["country"] . "</p>
                        <p>Available on : " . $serie["availableOn"] . "</p>
                        <p>Duration of episode : " . $serie["episodeDurationInMinutes"] . "</p>
                        <p>Number of seasons : " . $serie["numberOfSeasons"] . "</p>
                        <p>Number of episods : " . $serie["numberOfEpisods"] . "</p>
                        <p>Ongoing : " . $serie["ongoing"] . "</p>
                        <p>URL image : " . $serie["image"] . "</p>
                        <ul><span>Créé par : </span>$creators</ul>
                        <ul><span>Casting: </span>$actors</ul></li>";
                    };
                }
                ?>
            </div>
        </section>


        <!-- QUESTION 5 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Globaliser l'entête et le pied des pages de ce mini-site.</p>
            <p class="exercice-txt">S'assurer de conserver les titres des pages et l'affichage dynamique du menu.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

        <!-- QUESTION 6 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Créer un tableau listant les pages du site.</p>
            <p class="exercice-txt">Créer une fonction générant le code HTML du menu du site.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

    </div>
    <div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>

</html>