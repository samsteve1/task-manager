<?php

use Todo\Models\Task;

require 'vendor/autoload.php';

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', '');

} catch (PDOException $e) {
    
    die($e->getMessage());
}


