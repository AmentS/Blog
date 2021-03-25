<?php

require_once './db_conn.php';
/** @var $pdo \PDO */


$test = $_POST['sort'] ?? '';

if($test == 'asc'){

    $statment = $pdo->prepare('select * from post ORDER BY post_date asc');
}else{
    $statment = $pdo->prepare('select * from post ORDER BY post_date desc');
}

$statment->execute();
$post = $statment->fetchAll(PDO::FETCH_ASSOC);

exit(json_encode($post));



