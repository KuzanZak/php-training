<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 1</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 1</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link active" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Evrivez la phrase suivante dans une balise HTML P en utilisant les 2 variables ci-dessous :</p>
            <p class="exercice-txt">"<i>Firstname</i> a obtenu <i>score</i> points à cette partie."</p>
            <div class="exercice-sandbox">
                <?php
                $firstname = "Samir";
                $score = 327;
                echo "<p>${firstname} a obtenu ${score} points à cette partie.</p>";
                ?>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des produits suivants et leurs prix.</p>
            <div class="exercice-sandbox">
                <?php
                $nameProduct1 = "arc";
                $priceProduct1 = 10.30;
                $nameProduct2 = "flèche";
                $priceProduct2 = 2.90;
                $nameProduct3 = "potion";
                $priceProduct3 = 5.20;

                echo "<li>${nameProduct1} : ${priceProduct1} €</li>
                      <li>${nameProduct2} : ${priceProduct2} €</li>
                      <li>${nameProduct3} : ${priceProduct3} €</li>";
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Calculer le montant total de la commande des produits ci-dessus avec les quantités ci-dessous et appliquez lui une remise de 10%.</p>
            <div class="exercice-sandbox">
                <?php
                $quantityProduct1 = 1;
                $quantityProduct2 = 10;
                $quantityProduct3 = 4;

                $totalPrice1 = $priceProduct1 * $quantityProduct1;
                $totalPrice2 = $priceProduct2 * $quantityProduct2;
                $totalPrice3 = $priceProduct3 * $quantityProduct3;

                $total = $totalPrice1;
                $total += $totalPrice2;
                $total += $totalPrice3;
                $reduc = $total * 0.9;

                echo "<p>Le montant total de la commande est de $total €, après la remise, il est de $reduc €.</p>";
                ?>
            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Affichez le prix le plus élevé des 3 produits ci-dessus.</p>
            <div class="exercice-sandbox">
                <?php
                $max = max($totalPrice1, $totalPrice2, $totalPrice3);
                echo "Le prix le plus élevé des 3 produits est $max €.</p>";
                ?>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <?php

        $text1 = "Le marchand m'a vendu un arc et des flèches.";
        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Affichez dans une liste HTML le nom des produits de la question 2 qui sont présents dans la phrase : "<?= $text1 ?>"</p>
            <div class="exercice-sandbox">
                <?php
                if ($arc = str_contains($text1, $nameProduct1)) echo "<li>$nameProduct1 </li>";
                if ($fleche = str_contains($text1, $nameProduct2)) echo "<li>$nameProduct2 </li>";
                if ($fleche = str_contains($text1, $nameProduct3)) echo "<li>$nameProduct3 </li>";
                ?>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Parmis les scores suivants, affichez le prénom des joueurs qui ont obtenus entre 50 et 150 points.</p>
            <div class="exercice-sandbox">
                <?php

                $namePlayer1 = "Tim";
                $scorePlayer1 = 67;
                $namePlayer2 = "Morgan";
                $scorePlayer2 = 198;
                $namePlayer3 = "Hamed";
                $scorePlayer3 = 21;
                $namePlayer4 = "Camille";
                $scorePlayer4 = 134;
                $namePlayer5 = "Kevin";
                $scorePlayer5 = 103;

                if (50 <= $scorePlayer1 && $scorePlayer1 <= 150) echo "<p>$namePlayer1 a un score compris entre 50 et 150.</p>";
                if (50 <= $scorePlayer2 && $scorePlayer2 <= 150) echo "<p>$namePlayer2 a un score compris entre 50 et 150.</p>";
                if (50 <= $scorePlayer3 && $scorePlayer3 <= 150) echo "<p>$namePlayer3 a un score compris entre 50 et 150.</p>";
                if (50 <= $scorePlayer4 && $scorePlayer4 <= 150) echo "<p>$namePlayer4 a un score compris entre 50 et 150.</p>";
                if (50 <= $scorePlayer5 && $scorePlayer5 <= 150) echo "<p>$namePlayer5 a un score compris entre 50 et 150.</p>";

                ?>
            </div>
        </section>


        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">En réutilisant les scores de la question précédente, afficher le nom du joueur ayant obtenu le plus grand score.</p>
            <div class="exercice-sandbox">
                <?php
                $maxScore = max($scorePlayer1, $scorePlayer2, $scorePlayer3, $scorePlayer4, $scorePlayer5);
                if ($scorePlayer1 === $maxScore) echo "<p>Le/la meilleur/se joueur/se est $namePlayer1.</p>";
                if ($scorePlayer2 === $maxScore) echo "<p>Le/la meilleur/se joueur/se est $namePlayer2.</p>";
                if ($scorePlayer3 === $maxScore) echo "<p>Le/la meilleur/se joueur/se est $namePlayer3.</p>";
                if ($scorePlayer4 === $maxScore) echo "<p>Le/la meilleur/se joueur/se est $namePlayer4.</p>";
                if ($scorePlayer5 === $maxScore) echo "<p>Le/la meilleur/se joueur/se est $namePlayer5.</p>";

                // $scores = [
                //     $namePlayer1 => $scorePlayer1,
                //     $namePlayer2 => $scorePlayer2,
                //     $namePlayer3 => $scorePlayer3,
                //     $namePlayer4 => $scorePlayer4,
                //     $namePlayer5 => $scorePlayer5
                // ];
                // var_dump($scores);

                // foreach ($scores as $namePlayer => $scorePlayer) {
                //     if (!isset($maxScore2) || $scorePlayer > $maxScore2) {
                //         $maxScore2 = $scorePlayer;
                //         $topPlayer = $namePlayer;
                //     };
                // };
                // echo "<p>Le/la meilleur/se joueur/se est $namePlayer.</p>";

                // $maxScore3 = max($scores);
                // echo $maxScore3;
                // foreach ($scores as $namePlayer => $scorePlayer) {
                //     if ($scorePlayer === $maxScore3) {
                //         $topPlayer = $namePlayer;
                //     };
                // };
                // echo "<p>Le/la meilleur/se joueur/se est $namePlayer.</p>";
                // Vérifier avec les boucles, car j'obtiens Kevin alors qu'il faut Morgan.

                ?>
            </div>
        </section>


        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Affichez le prénom du joueur le plus long en nombre de caractères.</p>
            <div class="exercice-sandbox">
                <?php
                if (strlen($namePlayer1) > strlen($namePlayer2)) {
                    $maxS = strlen($namePlayer1);
                    $nameS = $namePlayer1;
                } else {
                    $maxS = strlen($namePlayer2);
                    $nameS = $namePlayer2;
                }
                if (strlen($namePlayer3) > $maxS) {
                    $maxS = strlen($namePlayer3);
                    $nameS = $namePlayer3;
                }
                if (strlen($namePlayer4) > $maxS) {
                    $maxS = strlen($namePlayer4);
                    $nameS = $namePlayer4;
                }
                if (strlen($namePlayer5) > $maxS) {
                    $maxS = strlen($namePlayer5);
                    $nameS = $namePlayer5;
                }
                echo "<p>Le joueur avec le prénom le plus long est $nameS.</p>"

                ?>
            </div>
        </section>

        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Créer une variable $players ayant pour valeur un tableau multidimensionnel contenant toutes les données des joueurs avec leurs scores ci-dessus et leurs ages ci-dessous.</p>
            <ul class="exercice-txt">
                <li>Tim : 25 ans</li>
                <li>Morgan : 34 ans</li>
                <li>Hamed : 27 ans</li>
                <li>Camille : 47 ans</li>
                <li>Kevin : 31 ans</li>
            </ul>
            <p class="exercice-txt">Afficher la valeur de cette variable avec tous les détails.</p>
            <div class="exercice-sandbox">
                <?php
                $players = [
                    ["Name" => "Tim",  "Score" => 67, "Age" => 25],
                    ["Name" => "Morgan",  "Score" => 198, "Age" => 34],
                    ["Name" => "Hamed",  "Score" => 21, "Age" => 27],
                    ["Name" => "Camille",  "Score" => 134, "Age" => 47],
                    ["Name" => "Kevin", "Score" => 103, "Age" => 31]
                ];
                var_dump($players);
                ?>


            </div>
        </section>

        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher le prénom et l'âge du joueur le plus jeune dans une phrase dans une balise HTML P.</p>
            <div class="exercice-sandbox">
                <?php
                if ($players[0]["Age"] < $players[1]["Age"]) {
                    $minA = $players[0]["Age"];
                    $nameY = $players[0]["Name"];
                } else {
                    $minA = $players[1]["Age"];
                    $nameY = $players[1]["Name"];
                }
                if ($players[2]["Age"] < $minA) {
                    $minA = $players[2]["Age"];
                    $nameY = $players[2]["Name"];
                }
                if ($players[3]["Age"] < $minA) {
                    $minA = $players[3]["Age"];
                    $nameY = $players[3]["Name"];
                }
                if ($players[4]["Age"] < $minA) {
                    $minA = $players[4]["Age"];
                    $nameY = $players[4]["Name"];
                }
                echo "<p>Le joueur le plus jeune est âgé de $minA et c'est : $nameY.</p>"
                ?>
            </div>
        </section>

    </div>
    <div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>

</html>