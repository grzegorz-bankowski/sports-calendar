<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/add-event' => 'controllers/add-event.php',
    '/more' => 'controllers/more.php',
];

function route($uri, $routes): void {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        header("location: ./?url=invalid");
    }
}

route($uri, $routes);