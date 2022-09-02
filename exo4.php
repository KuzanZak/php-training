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
                <?php
                /**
                 * Gives the HTML list from the given array.
                 *
                 * @param array $array
                 * @return string
                 */
                function getHtmlFromArray(array $array): string
                {
                    $list = "";
                    foreach ($array as $value) {
                        $list .= "<li>$value</li>";
                    }
                    return "<ul>$list</ul>";
                }
                echo getHtmlFromArray($array);

                function getHtmlFromArray1(array $array): string
                {
                    // return "<ul><li>" . implode("</li><li> ", $array) . "</li></ul>";
                    $valueToLi = fn ($v) => "<li>$v</li>";
                    return "<ul>" . implode("", array_map($valueToLi, $array)) . "</ul>";
                }
                echo getHtmlFromArray1($array);
                ?>

            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les valeurs paires. Afficher les valeurs du tableau sous la forme d'une liste HTML.</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    /**
                     * Filters the even numbers of the given array.
                     *
                     * @param array $array The array to filter.
                     * @return array Filtered array. 
                     */
                    function getEvenNumbersFromArray(array $array): array
                    {
                        $a = [];
                        foreach ($array as $number) {
                            if ($number % 2 === 0) {
                                $a[] = $number;
                            }
                        }
                        return $a;
                    }

                    // function getEvenNumbersFromArray1(array $array): array
                    // {
                    //     return array_filter($array, fn ($v) => $v % 2 === 0);
                    // }
                    echo getHtmlFromArray1(getEvenNumbersFromArray($array));
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
                    /**
                     * Get values having even index from the array.
                     *
                     * @param array $array
                     * @return array 
                     */
                    function getEvenIndex(array $array): array
                    {

                        $b = [];
                        foreach ($array as $index => $value) {
                            if ($index % 2 === 0) {
                                $b[] = $value;
                            }
                        }
                        return $b;
                    }
                    // echo getHtmlFromArray1(getEvenIndex($array));

                    function getEvenIndexFromArray(array $array): array
                    {
                        return array_filter($array, fn ($k) =>  $k % 2 === 0, ARRAY_FILTER_USE_KEY);
                    }
                    echo getHtmlFromArray1(getEvenIndexFromArray($array));
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
                /**
                 * Filters numeric values of the given array and multiplies by 2.
                 *
                 * @param array $array
                 * @return array
                 */
                function getValuesMultiplyBy2(array $array): array
                {
                    // $table = [];
                    // foreach ($array as $value) {
                    //     if (is_numeric($value)) $table[] = $value * 2;
                    // }
                    // return $table;

                    return array_map(fn ($v) => $v * 2, array_filter($array, "is_numeric"));
                }
                var_dump(getValuesMultiplyBy2($arrayA));
                ?>

            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et un entier. La fonction doit retourner les valeurs du tableau divisées par le second paramètre</p>
            <div class="exercice-sandbox">
                <?php
                /**
                 * Filters numeric values of the given array and divided by the second parameter. 
                 *
                 * @param array $array The list of values to be divided. 
                 * @param integer $div The divider.
                 * @return array
                 */
                function displayT2(array $array, int $div): array
                {
                    // $table = [];
                    // foreach ($array as $value) {
                    //     if (is_numeric($value)) $table[] = $value / $int;
                    // }
                    // return $table;
                    return array_map(fn ($v) => $v / $div, array_filter($array, "is_numeric"));
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
                /**
                 * Removes duplicate values of the array. 
                 *
                 * @param array $array
                 * @return array
                 */
                function cleanArrayFromDuplicata(array $array): array
                {
                    $table = [];
                    foreach ($array as $key => $value) {
                        if (!in_array($value, $table)) $table[$key] = $value;
                    }
                    return $table;
                    // return array_unique($array);
                }
                var_dump(cleanArrayFromDuplicata($arrayA));
                ?>

            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau représentant l'intersection des 2</p>
            <div class="exercice-sandbox">
                <?php

                /**
                 * Return the intersection of 2 arrays. 
                 *
                 * @param array $array1
                 * @param array $array2
                 * @return array
                 */
                function displayT3(array $array1, array $array2): array
                {
                    // $a = [];
                    // foreach ($array1 as $key => $value) {
                    //     if (in_array($value, $array2)) $a[$key] = $value;
                    // }
                    // return $a;
                    // return array_intersect($array1, $array2);
                    return array_filter($array1, fn ($v) => in_array($v, $array2));
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
                /**
                 * Return the values from the first array, that are not in the second one. 
                 *
                 * @param array $array1
                 * @param array $array2
                 * @return array
                 */
                function getArraydifference(array $array1, array $array2): array
                {
                    // return array_diff($array1, $array2);
                    $output = [];

                    foreach ($array1 as $key => $value) {
                        if (!in_array($value, $array2)) $output[$key] = $value;
                    }
                    return $output;
                    // return array_filter($array1, fn ($v) => !in_array($v, $array2));
                }
                var_dump(getArraydifference($arrayA, $arrayB));


                /**
                 * Return different values between 2 arrays. 
                 *
                 * @param array $array1
                 * @param array $array2
                 * @return array
                 */
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
                /**
                 * Return the values from the first array, that are not in the second one and without duplicate.
                 *
                 * @param array $array1
                 * @param array $array2
                 * @param boolean $unique Remove the duplicate from output.
                 * @return array
                 */
                function getArraydifferenceWithoutDuplicate(array $array1, array $array2, bool $unique = false): array
                {
                    // return array_diff($array1, $array2);
                    $output = [];
                    foreach ($array1 as $key => $value) {
                        if (!in_array($value, $array2)) $output[$key] = $value;
                    }

                    if ($unique) return cleanArrayFromDuplicata($output);

                    return $output;
                    // return array_filter($array1, fn ($v) => !in_array($v, $array2));
                }
                var_dump(getArraydifferenceWithoutDuplicate($arrayA, $arrayB, true));
                ?>

            </div>
        </section>


        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et un entier et retourne les n premiers éléments du tableau.</p>
            <div class="exercice-sandbox">
                <?php
                /**
                 * Returns N values from the array.
                 *
                 * @param array $array The list of values
                 * @param integer $int The number of values that we want
                 * @return array
                 */
                function getNValuesFromArray(array $array, int $n): array
                {
                    $output = [];
                    foreach ($array as $key => $value) {
                        if (sizeof($output) < $n) $output[$key] = $value;
                        else break;
                    }
                    return $output;

                    // $output = [];
                    // while (sizeof($output) < $n) {
                    //     if (sizeof($array) === 0) break;
                    //     $output[] = array_shift($array);
                    // }
                    // return $output;

                    // return array_slice($array, 0, $n);
                }
                var_dump(getNValuesFromArray($array, 4));
                ?>

            </div>
        </section>
    </div>
    <div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>

</html>