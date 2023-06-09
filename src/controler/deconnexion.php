<?php
require "connexion.php";
$connexion;
$connexion;
$europe;

if (isset($_SESSION['id']) && $_SESSION['admin'] == 0) 
{
    $connexion = "/home?id=" . $_SESSION['id'];
    $connexion = "/instanceFrançaise?id=" . $_SESSION['id'];
    $europe = "/instanceEuropéenne?id=" . $_SESSION['id'];
}
else if (isset($_SESSION['id']) && $_SESSION['admin'] == 0) 
{
    $connexion = "/home?id=" . $_SESSION['id'] . "?admin=" . $_SESSION['admin'];
    $connexion = "/instanceFrançaise?id=" . $_SESSION['id'] . "?admin=" . $_SESSION['admin'];
    $europe = "/instanceEuropéenne?id=" . $_SESSION['id'] . "?admin=" . $_SESSION['admin'];
}
else 
{
    $connexion = "/login";
}
