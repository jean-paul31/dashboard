<?php
// require "connexion.php";
// $id = $_SESSION['id'];

if (isset($_SESSION['id']) && $_SESSION['admin'] == 0) 
{
    $home = "home?id=" . $_SESSION['id'];
    $europe = "instanceurope?id=" . $_SESSION['id'];
    $france =  "instancefrance?id=" . $_SESSION['id'];
    $deconnexion = "login";

    if ($europe) {
        require("src/view/searcheu.php");
    } elseif ($france) {
        require("src/view/searchfr.php");
    } elseif ($home) {
        require("src/view/home.php");
    } else {
        require("src/view/login.php");
    }
}
else if (isset($_SESSION['id']) && $_SESSION['admin'] == 1) 
{
    $home = "home?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'];
    $europe = "instanceurope?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'];
    $france =  "instancefrance?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin']; 
    $deconnexion = "login";  
    if ($europe) {
        require("src/view/searcheu.php");
    } elseif ($france) {
        require("src/view/searchfr.php");
    } elseif ($home) {
        require("src/view/home.php");
    } else {
        require("src/view/login.php");
    }
}
elseif (!isset($_SESSION['id'])) {
    require("src/view/login.php");
}