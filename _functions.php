<?php
function getListFromArray(array $array): string
{
    $list = "";
    foreach ($array as $key) {
        if (!is_null($key)) $list .= "<li class=" . "list-s" . ">$key</li>";
    }
    return $list;
}
function getHtmlFromArray1(array $array): string
{
    // return "<ul><li>" . implode("</li><li> ", $array) . "</li></ul>";
    $valueToLi = fn ($v) => "<li>$v</li>";
    return "<ul>" . implode("", array_map($valueToLi, $array)) . "</ul>";
}
?>;