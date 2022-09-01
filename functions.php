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
