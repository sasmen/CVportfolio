<?php
session_start();

function route($uri)
{
    $routes = [
        '/' => 'home.php',
        '/cv' => 'cv.php',
        '/projects' => 'projects.php',
        '/login' => 'login.php',
        '/logout' => 'logout.php',
        '/profile' => 'profile.php',
        '/contact' => 'contact.php'
    ];

    if (array_key_exists(key: $uri, array: $routes)) {
        return $routes[$uri];
    } else {
        return '404.php';
    }
}

$request_uri = parse_url(url: $_SERVER['REQUEST_URI'], component: PHP_URL_PATH);
$page = route(uri: $request_uri);

// Include necessary files
require_once 'db.php';
require_once 'functions.php';

// Start output buffering
ob_start();

// Include the header
include 'header.php';

// Include the appropriate page
include 'views/' . $page;

// Include the footer
include 'footer.php';

// End output buffering and flush the output
ob_end_flush();
