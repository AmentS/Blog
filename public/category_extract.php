<?php

require_once './db_conn.php';
/** @var $pdo \PDO */

$statment = $pdo->prepare('select * from category');

$statment->execute();
$cat = $statment->fetchAll(PDO::FETCH_ASSOC);
exit(json_encode($cat));