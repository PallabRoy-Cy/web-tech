<?php

// The root directory of your project.
$dir = __DIR__ . '/../../';

// Get the requested URI and remove query string.
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

// Simple router
if ($request_uri === '/') {
    // If the request is for the root, serve homepage.php
    $file = $dir . 'homepage.php';
} else {
    // Construct the file path from the URI.
    $file = $dir . ltrim($request_uri, '/');
}

// Check if the file exists and is a .php file.
if (file_exists($file) && is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
    // Set the current working directory to the file's directory.
    // This helps with relative paths for includes/requires.
    chdir(dirname($file));
    require $file;
} else {
    // If the file doesn't exist, it might be a static asset.
    // Let Netlify's static file handling take over by returning false.
    // For a more robust solution, you might want to handle 404s here.
    return false;
}

?>