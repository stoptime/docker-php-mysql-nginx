<?php

$host = 'db';
$db   = 'delete_me';
$user = 'root';
$pass = 'password';
$charset = 'utf8';
$dbport = '3306';

$dsn = "mysql:host=$host;port=$dbport;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$test_table_create = "CREATE TABLE IF NOT EXISTS delete_me (
  `id` int(10) AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` longtext CHARACTER SET utf8mb4,
  `created` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;";

$table = $pdo->prepare($test_table_create);
$table_create = $table->execute();

$sql_insert = "INSERT INTO delete_me (title, body, created) VALUES (?,?,?)";
$stmt= $pdo->prepare($sql_insert);
$stmt->execute(['Delete Me', "<p>Yo, you should really delete me.<p>", time()]);

$select = $pdo->query('SELECT * FROM delete_me');
while ($row = $select->fetch()) {
  var_dump($row);
}
