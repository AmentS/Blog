<?php

require_once './db_conn.php';
/** @var $pdo \PDO */


if (isset($_POST)) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    $reason = $_POST['select'];

    try {
        $statment = $pdo->prepare('INSERT INTO contact (name, email, text, reason_id) VALUES (:name, :email, :text, :reason_id)');
        $statment->bindValue(':name', $name);
        $statment->bindValue(':email', $email);
        $statment->bindValue(':text', $text);
        $statment->bindValue(':reason_id', $reason);
        $statment->execute();
        exit('saved');
    }
    catch (PDOException $e){
        exit($e);
    }

}
