<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 4</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 4</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link active" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

        <?php

        $array = [12, 65, 95, 41, 85, 63, 71, 64];

        $arrayA = [12, "le", 95, 12, 85, "le", 71, "toi", 95, "la"];
        $arrayB = [85, "toi", 95, "la", 65, 94, 85, "avec", 37, "chat"];
        ?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et retourne la chaîne de caractère HTML permettant d'afficher les valeurs du tableau sous la forme d'une liste.</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    function display(array $array): string
                    {
                        $list = "";
                        foreach ($array as $key) {
                            $list .= "<li>$key</li>";
                        }
                        return $list;
                    }
                    echo display($array);
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les valeurs paires. Afficher les valeurs du tableau sous la forme d'une liste HTML.</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    function displayE(array $array): string
                    {
                        $list = "";
                        foreach ($array as $key) {
                            if (is_int($key) == true && $key % 2 !== 1) {
                                $list .= "<li>$key</li>";
                            }
                        }
                        return $list;
                    }
                    echo displayE($arrayB);
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les entiers d'index pair</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    function displayI(array $array): string
                    {
                        $list = "";
                        foreach ($array as $num => $key) {
                            if ($num % 2 === 0) {
                                $list .= "<li>$num : $key</li>";
                            }
                        }
                        return $list;
                    }
                    echo displayI($array);
                    ?>
                </ul>

            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers. La fonction doit retourner les valeurs du tableau mulipliées par 2.</p>
            <div class="exercice-sandbox">
                <?php
                function displayT(array $array): array
                {
                    $table = [];
                    foreach ($array as $key) {
                        if (is_int($key) == true) array_push($table, $key * 2);
                    }
                    return $table;
                }
                var_dump(displayT($arrayB));
                ?>

            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et un entier. La fonction doit retourner les valeurs du tableau divisées par le second paramètre</p>
            <div class="exercice-sandbox">
                <?php
                function displayT2(array $array, int $int): array
                {
                    $table = [];
                    foreach ($array as $key) {
                        if (is_int($key) == true) array_push($table, $key / $int);
                    }
                    return $table;
                }
                var_dump(displayT2($arrayB, 2));
                ?>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers ou de chaînes de caractères et retourne le tableau sans doublons</p>
            <div class="exercice-sandbox">
                <?php
                function displayTs(array $array): array
                {
                    $table = [];
                    foreach ($array as $key) {
                        if (!in_array($key, $table)) array_push($table, $key);
                    }
                    return $table;
                }
                var_dump(displayTs($arrayA));
                ?>

            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau représentant l'intersection des 2</p>
            <div class="exercice-sandbox">
                <?php
                function displayT3(array $array1, array $array2): array
                {
                    $table = [];
                    $table = array_intersect($array1, $array2);
                    return $table;
                }
                var_dump(displayT3($arrayA, $arrayB));
                ?>

            </div>
        </section>

        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau des valeurs du premier tableau qui ne sont pas dans le second</p>
            <div class="exercice-sandbox">
                <?php
                function displayT4(array $array1, array $array2): array
                {
                    $table = [];
                    $table = array_diff($array1, $array2);

                    return $table;
                }
                var_dump(displayT4($arrayA, $arrayB));


                // Permet d'afficher les différences des deux tableaux.
                function displayT4Bis(array $array1, array $array2): array
                {
                    $table = [];
                    foreach ($array1 as $key) {
                        if (!in_array($key, $array2)) array_push($table, $key);
                    }
                    foreach ($array2 as $key) {
                        if (!in_array($key, $array1)) array_push($table, $key);
                    }
                    return $table;
                }
                var_dump(displayT4Bis($arrayA, $arrayB));
                ?>

            </div>
        </section>

        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Réécrire la fonction précédente pour lui ajouter un paramètre booléen facultatif. Si celui-ci est à true, le tableau retourné sera sans doublons</p>
            <div class="exercice-sandbox">
                <?php
                function displayT4Bis1(array $array1, array $array2, bool $factor = true): array
                {
                    $table = [];
                    $table = array_diff($array1, $array2);

                    if ($factor) $table = array_unique($table);

                    return $table;
                }
                var_dump(displayT4Bis1($array, $arrayB));
                ?>

            </div>
        </section>


        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et un entier et retourne les n premiers éléments du tableau.</p>
            <div class="exercice-sandbox">
                <?php
                function nFirst(array $array, int $int): array
                {
                    $table = [];
                    foreach ($array as $key) {
                        if (sizeof($table) < $int) array_push($table, $key);
                    }
                    return $table;
                }
                var_dump(nFirst($array, 7));
                ?>

            </div>
        </section>
    </div>
    <div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>

</html>