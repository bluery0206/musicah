<?php

session_start();

$serverProtocol = strtolower(explode("/", $_SERVER['SERVER_PROTOCOL'])[0]);
$baseUrl = $serverProtocol . "://" . $_SERVER['HTTP_HOST'] . "/";

// Populate if the project is in a subdirectory of htdocs
// Example:
//      $dir = "parentDirName/projectDirName/";
$dir = "php-projects/musicah/";

if (isset($dir)) {
    $baseUrl = "{$baseUrl}{$dir}";
}

$publicDir = "public/";
$publicUrl = "{$baseUrl}{$publicDir}";


// URLs

$publicUrls = (object)[
    "signin" => "{$publicUrl}signin.php",
    "signup" => "{$publicUrl}signup.php",
    "signout" => "{$publicUrl}signout.php",
];

// In attempt to follow how Django urls work
$urls = (object)[
    "index" => $baseUrl,
    "public" => $publicUrls,
];

// Forces user to login before seeing the website
if (!isset($_SESSION['user']) && !str_contains($_SERVER['PHP_SELF'], "signin")) {
    header("Location:{$urls->public->signin}");
}
