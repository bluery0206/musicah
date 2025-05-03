<?php

$_SERVER['PROJECT_DIR_NAME'] = "musicah";
$_SERVER['PARENT_DIR_NAME'] = "php-projects";
$_SERVER['HTTP_PROTOCOL'] = strtolower(explode("/", $_SERVER['SERVER_PROTOCOL'])[0]);
$_SERVER['URL_INDEX'] = $_SERVER['HTTP_PROTOCOL'] . "://" . $_SERVER['SERVER_NAME'] . "/" . $_SERVER['PARENT_DIR_NAME'] . "/". $_SERVER['PROJECT_DIR_NAME'] . "/";
$_SERVER['URL_PUBLIC'] = $_SERVER['INDEX_URL'] . "public/";
$_SERVER["IN_PUBLIC_DIR"] = strrpos($_SERVER["PHP_SELF"],"public");
