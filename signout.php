<?php
    include_once 'autoload.php';
    
    session_start();
    $userController = new UserController();
    $userController->signout();
    header("Location:index.php");