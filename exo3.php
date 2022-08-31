<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 3</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 3</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link active" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

        <?php

        $fruits = ["fraise", "banane", "pomme", "cerise", "ananas"];

        $prices = [3, 2, 2, 5, 8];

        ?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Ordonner le tableau des prix par ordre croissant et l'afficher en détail</p>
            <div class="exercice-sandbox">
                <?php
                // sort($prices);
                var_dump($prices);
                ?>

            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Ajouter 1 euro à chaque prix</p>
            <div class="exercice-sandbox">
                <?php
                $newPrices = [];
                foreach ($prices as $price) {
                    array_push($newPrices, $price + 1);
                };
                $prices = $newPrices;
                var_dump($prices);
                // var_dump($newPrices);

                // foreach ($prices as $num => $price) {
                //     $price = $prices[$num] + 1;
                // };
                // var_dump($prices);
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Créer le tableau $store qui combine les tableaux des fruits et des prix afin d'obtenir un tableau associatif d'attribution des prix. Afficher le tableau obtenu</p>
            <div class="exercice-sandbox">
                <?php
                $store = array_combine($fruits, $prices);
                var_dump($store);
                ?>

            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix inférieur à 4 euros</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php

                    foreach ($store as $name => $price) {
                        if ($price > 4) echo "<li>$name</li>";
                    }

                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix pair</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php

                    foreach ($store as $name => $price) {
                        if ($price % 2 !== 1) echo "<li>$name</li>";
                    }

                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Composer un panier de fruits ne dépassant pas 12 euros</p>
            <div class="exercice-sandbox">
                <?php
                // Ajouter l'option aléatoire 
                // var_dump($store);
                $total = 0;
                $fruitsPanier = "";
                // shuffle($store);
                foreach ($store as $name => $price) {
                    if ($total <= 12 && $price <= (12 - $total) && str_contains($fruitsPanier, $name == false)) {
                        $total += $price;
                        $fruitsPanier .= "$name, ";
                    };
                };
                echo "Le panier est composé de : $fruitsPanier et le prix total est de $total.";
                ?>

            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">En reprenant le prix total du panier constitué à la question précédente, appliquez-lui une taxe de 18%. Afficher le total taxe comprise.</p>
            <div class="exercice-sandbox">
                <?php
                echo $total * 0.82;
                ?>

            </div>
        </section>

        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Ajouter au tableau $store le fruit "kiwi" pour un prix de 1,50 € puis afficher le tableau complet</p>
            <div class="exercice-sandbox">
                <?php
                $store["kiwi"] = 1.50;
                var_dump($store);
                ?>

            </div>
        </section>

        <!-- QUESTION 9 -->
        <?php
        $newFruits = [
            "pêche" => 3,
            "abricot" => 2,
            "mangue" => 9
        ];
        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Ajouter les nouveaux fruits du tableau $newFruits au tableau $store</p>
            <div class="exercice-sandbox">
                <?php
                // Refaire cette question
                $store["pêche"] = 3;
                $store["abricot"] = 2;
                $store["mangue"] = 9;
                var_dump($store);

                // $store[array_keys($newFruits["pêche"])] = 3;
                // var_dump($store);
                // var_dump($newFruits);
                // echo $newFruits["pêche"];

                ?>

            </div>
        </section>

        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher le nom et le prix du fruit le moins cher</p>
            <div class="exercice-sandbox">
                <?php
                foreach ($store as $name => $price) {
                    if (!isset($minP) || $price < $minP) {
                        $minP = $price;
                        $cheepP = $name;
                    }
                }
                echo "Le produit le moins cher est $cheepP ($minP €)."
                ?>


            </div>
        </section>

        <!-- QUESTION 11 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 11</h2>
            <p class="exercice-txt">Afficher les noms et le prix des fruits les plus chers</p>
            <div class="exercice-sandbox">
                <?php
                // foreach ($store as $name => $price) {
                //     if (!isset($maxP) || $price > $maxP) {
                //         $maxP = $price;
                //         $expensiveP .= $name;
                //     };
                // }
                // echo "Le produit les plus cher sont $expensiveP ($maxP €).";

                $maxP = max($store);
                $expensiveP = "";
                foreach ($store as $name => $price) {
                    if ($price === $maxP) {
                        $expensiveP .= "$name, ";
                    };
                }
                echo "Le produit les plus cher sont $expensiveP ($maxP €).";
                ?>
            </div>
        </section>
    </div>
    <div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>

</html>