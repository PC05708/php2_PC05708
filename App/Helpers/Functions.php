<?php
function showArr($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function showModules($url = '', $data = [])
{
    $controller = new Controller();
    $controller->render("Blocks/header");
    $controller->render("Blocks/sidebar");
    $controller->render($url, $data);
    $controller->render("Blocks/footer");
}
