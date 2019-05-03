<?php

use Todo\Models\Task;
use Todo\TaskManager;
use Todo\Storage\MysqlDatabaseTaskStorage;

require 'vendor/autoload.php';

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', '');

} catch (PDOException $e) {
    
    die($e->getMessage());
}


$storage = new MysqlDatabaseTaskStorage($db);

$manager = new TaskManager($storage);

// $task = new Task;
// $task->setDescription("Fnish drone project!");
// $task->setDue(new DateTime('+ 4 weeks'));

// var_dump($manager->addTask($task));

$tasks = $manager->getTasks();

var_dump($tasks);