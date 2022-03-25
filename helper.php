<?php

function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function redirect($url) {
    header("Location: $url");
    die();
}