<?php

use Todo\Models\Task;
use Todo\Storage\MysqlDatabaseTaskStorage;

require 'vendor/autoload.php';

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', '');

} catch (PDOException $e) {
    
    die($e->getMessage());
}


$storage = new MysqlDatabaseTaskStorage($db);

$task = $storage->get(4);

$task->setDescription('LEarn Node real good');
$task->setDue(new DateTime('+ 3 weeks'));
$task->setComplete();

var_dump($storage->update($task));

