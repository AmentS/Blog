<?php

require_once './db_conn.php';
/** @var $pdo \PDO */

$statment = $pdo->prepare('select * from reason');

$statment->execute();
$reason = $statment->fetchAll(PDO::FETCH_ASSOC);
exit(json_encode($reason));