<?php
    include_once '../config/globals.php';
    include_once '../autoload.php';
    
    $userController = new UserController();
    $userController->signout();
    header("Location:{$urls->index}");