<?php

$pdo = new \PDO('mysql:host=mysql;dbname=tasks;port=3306;charset=utf8mb4;', 'root', 'root');
$ids = implode(',', array_map(intval(...), [1,2,3]));
$query = sprintf('SELECT id, title, duedate, completed, last_updated_by FROM task_invalid WHERE id IN (%s)', $ids);
$statement = $pdo->query($query);
print_r($statement->fetchAll());

$pdo = new \PDO('mysql:host=mysql;dbname=tasks;port=3306;charset=utf8mb4;', 'root', 'root');
$query = sprintf('SELECT id, title, duedate, completed, last_updated_by FROM task_invalid WHERE id IN (%s)', '1,2,3');
$statement = $pdo->query($query);
print_r($statement->fetchAll());

$pdo = new \PDO('mysql:host=mysql;dbname=tasks;port=3306;charset=utf8mb4;', 'root', 'root');
$query = 'SELECT id, title, duedate, completed, last_updated_by FROM tasks_invalid WHERE customer_id = ? AND completed = 1';
$statement = $pdo->prepare($query);
$statement->execute([123]);
$result = $statement->fetch();

$pdo = new \PDO('mysql:host=mysql;dbname=tasks;port=3306;charset=utf8mb4;', 'root', 'root');
$query = 'SELECT id, title, duedate, completed, last_updated_by FROM tasks_invalid WHERE customer_id = 123 AND completed = 1';
$statement = $pdo->prepare($query);
$statement->execute([]);
$result = $statement->fetch();