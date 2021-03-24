<?php

require_once './db_conn.php';
/** @var $pdo \PDO */


$statment = $pdo->prepare('select * from post');
$statment->execute();
$post = $statment->fetchAll(PDO::FETCH_ASSOC);

exit(json_encode($post));



