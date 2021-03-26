<?php

include_once './db_conn.php';

/** @var $pdo \PDO */

$id = $_GET['id'];

$statment = $pdo->prepare('select c.comm, c.comm_date, u.username from comment c inner join  user u on u.id = c.user_id and post_id = :id');
$statment->bindValue(':id', $id);
$statment->execute();
$comm = $statment->fetchAll(PDO::FETCH_ASSOC);

exit(json_encode($comm));
