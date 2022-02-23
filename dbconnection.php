<?php
$pdo = new PDO('mysql:dbname=darkprojectdb;host=localhost','root','rebelsA1*');
$sql = $pdo->query('SELECT * FROM usuarios');
$dados = $sql->fetchAll();
print_r($dados);
?>