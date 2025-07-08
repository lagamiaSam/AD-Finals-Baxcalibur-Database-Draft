<?php

// This handles routing for the PHP built-in server by:

// - Serving static files (like .css, .js, .html) directly.
// - Routing all other requests to the main PHP application (e.g., index.php).

// This allows clean URLs and simulated web server behavior without Apache or Nginx.

require __DIR__ . '/bootstrap.php';

if (php_sapi_name() === 'cli-server') {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $file = BASE_PATH . $urlPath;
    if (is_file($file)) {
        return false;
    }
}

// TODO: Change this to require ERRORS_PATH . '/_404.error.php';
require BASE_PATH . '/index.php';
