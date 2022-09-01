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
                // var_dump($series);
                $plateform = [];
                foreach ($series as $serie) {
                    if (!in_array($serie["availableOn"], $plateform)) array_push($plateform, $serie["availableOn"]);
                }
                sort($plateform);
                var_dump($plateform);
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
                foreach ($series as $serie) {
                    foreach ($serie["styles"] as $style) {
                        if (!in_array($style, $styles)) array_push($styles, $style);
                    }
                }
                sort($styles);
                var_dump($styles);
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
                <ul>
                    <?php
                    function display(array $array): string
                    {
                        $list = "";
                        foreach ($array as $key) {
                            if (!is_null($key)) $list .= "<li>$key</li>";
                        }
                        return $list;
                    }

                    // var_dump($series);
                    // var_dump($series[0]);
                    // var_dump($series[0]["image"], $series[0]["name"], $series[0]["createdBy"][0], $series[0]["createdBy"][1], $series[0]["actors"][0], $series[0]["actors"][1], $series[0]["actors"][2]);
                    // echo "<li class = " . "list" . "><h3 class = " . "title" . ">" . $series[0]["name"] . "</h3><img class = " . "img" . " src =" . $series[0]["image"] . "><p class = " . "created" . ">Créé par : " . $series[0]["createdBy"][0] . ", " . $series[0]["createdBy"][1] . "</p><p class = " . "casting" . ">Casting : " . $series[0]["actors"][0] . ", " . $series[0]["actors"][1] . ", " . $series[0]["actors"][2] . "</p></li>";
                    // echo "<li class = " . "list" . "><h3 class = " . "title" . ">" . $series[0]["name"] . "</h3><img class = " . "img" . " src =" . $series[0]["image"] . "><ul class = " . "created" . "><span class = " . "spanT" . ">Créé par : </span> <li> " . $series[0]["createdBy"][0] . "</li><li> " . $series[0]["createdBy"][1] . "</li></ul><ul class = " . "casting" . "><span class = " . "spanT" . ">Casting : </span> <li>" . $series[0]["actors"][0] . "</li><li> " . $series[0]["actors"][1] . "</li><li>" . $series[0]["actors"][2] . "</li></ul></li>";
                    foreach ($series as $serie) {
                        // echo "<li class =" . "list" . "><h3 class = " . "title" . ">" . $serie["name"] . "</h3><img class = " . "img" . " src =" . $serie["image"] . "><ul class = " . "created" . "><span class = " . "spanT" . ">Créé par : </span> <li>$creators</li></ul></li>";
                        $actors = display($serie["actors"]);
                        $creators = display($serie["createdBy"]);
                        echo "<li class =" . "list" . "><h3 class = " . "title" . ">" . $serie["name"] . "</h3><img class = " . "img" . " src =" . $serie["image"] . "><ul class = " . "created" . "><span class = " . "spanT" . ">Créé par : </span>$creators</ul><ul class = " . "casting" . "><span class = " . "spanT" . ">Casting: </span>$actors</ul></li>";
                    }
                    ?>
                </ul>
            </div>
        </section>


        <!-- QUESTION 5 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série.</p>
            <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

    </div>
    <div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>

</html>