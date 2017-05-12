<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=canek;charset=utf8', 'root', 'guoqeuyiejtj');
$stmt = $pdo->prepare('UPDATE images SET x = :x, y = :y  WHERE id = :id');

$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT); 
$stmt->bindParam(':x', $_GET['x'], PDO::PARAM_INT); 
$stmt->bindParam(':y', $_GET['y'], PDO::PARAM_INT); 
$stmt->execute();
?>