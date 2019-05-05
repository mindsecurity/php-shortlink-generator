<?php
$links = parse_ini_file('links.ini');
$link = $_GET['l'];

$new = htmlspecialchars($link);

$final = filter_var(
    preg_replace("/[\r\n$>]/", "", $new),
    FILTER_SANITIZE_STRING
);

if(!empty($links[$final])) {
    header('Location: '.$links[$final]);
    die();
}

header('HTTP/1.0 404 Not Found');
echo '<h2>Unknown link.</h2>';
echo '<a href="mailto:webmaster@example.com">webmaster@example.com</a>';
//sleep(5);
//header('Location: https://www.example.com/');
