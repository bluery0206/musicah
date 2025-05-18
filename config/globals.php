<?php

session_start();

$serverProtocol = strtolower(explode("/", $_SERVER['SERVER_PROTOCOL'])[0]);
$baseUrl = $serverProtocol . "://" . $_SERVER['HTTP_HOST'] . "/";

// Populate if the project is in a subdirectory of htdocs
// Example:
//      $dir = "parentDirName/projectDirName/";
$dir = "php-projects/musicah/";
$rootDir = "/";

if (isset($dir)) {
    $rootDir .= $dir;
    $baseUrl .= $dir;
}


// You common media files
$asset = "{$rootDir}assets/";


$publicDir = "public/";
$publicUrl = "{$baseUrl}{$publicDir}";

// URLs
// In attempt to follow how Django urls work
// Or just at least make it easier to manage
$urls = (object)[
    "index" => $baseUrl,
    "signin" => "{$publicUrl}signin.php",
    "signup" => "{$publicUrl}signup.php",
    "signout" => "{$publicUrl}signout.php",
];


// Forces user to login before seeing the website
// if (!isset($_SESSION['user']) && (!str_contains($_SERVER['PHP_SELF'], "signin") || !str_contains($_SERVER['PHP_SELF'], "signup"))) {
//     header("Location:{$urls->public->signin}");
// }
