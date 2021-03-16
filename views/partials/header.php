<?php

include '../../public/db_conn.php'


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/js/app.js"></script>
    <title>Pocetna | Blogerino</title>
</head>
<body>
<nav>
    <div class="logo">
        Blogerino
    </div>
    <label for="btn" class="icon">
        <span class="fa fa-bars"></span>
    </label>
    <input type="checkbox" id="btn">
    <ul>
        <li><a href="#">Pocetna</a></li>
        <li>
            <label for="btn-1" class="show">Features +</label>
            <a href="#">Kategorije</a>
            <input type="checkbox" id="btn-1">
            <ul id="show_cat">
            </ul>
        </li>
        <li><a href="#">O meni</a></li>
        <li><a href="#">Kontakt</a></li>
    </ul>
</nav>
