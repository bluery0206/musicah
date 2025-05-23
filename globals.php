<?php

const SONGS_PER_PAGE = 10;
$current = array_reverse(explode("/", $_SERVER['REQUEST_URI']));
$current = array_shift($current);

if (!$current ) {
    $current = array_reverse(explode("/", $_SERVER['PHP_SELF']));
    $current = array_shift($current);
}

$current = base64_encode($current);



// foreach ($_SERVER as $key => $value) {
//     echo "$key = $value <br>";
// }