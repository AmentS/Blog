<?php

$title = $_POST['title'];
$category = $_POST['category'];
$content = $_POST['title'];


if (!$title) {
    $errors[] = 'Blog title is required';
}

if(!$content){
$errors[] = 'Content is required';
}