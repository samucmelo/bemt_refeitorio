<?php
/*
* Conecta com banco de dados.
*/
$pdo = new PDO(
    'mysql:host=localhost;dbname=bemt_refeitorio',
    'root',
    '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);