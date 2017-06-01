<?php

function slugify($text) {

    $text = preg_replace('#[^\\pL\d]+#u', '-', $text);

    $text = trim($text, '-');

    if (function_exists('iconv')) {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    $text = strtolower($text);

    return preg_replace('#[^-\w]+#', '', $text);
}
