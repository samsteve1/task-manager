<?php

namespace Todo\Storage;

use PDO;
use Todo\Models\Task;
use Todo\Storage\Contracts\TaskStorageInterface;


class MysqlDatabaseTaskStorage implements TaskStorageInterface
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function store(Task $task)
    {
        $statement = $this->db->prepare("

        INSERT INTO tasks (description, due, complete) 
        VALUES (:description, :due, :complete)

        ");

        $statement->execute([
            'description' => $task->getDescription(),
            'due' => $task->getDue()->format('Y-m-d H:i:s'),
            'complete' => $task->getComplete() ? 1 : 0,
        ]);
        
        return $this->db->lastInsertId();
    }

    public function update(Task $task)
    {
        $statement = $this->db->prepare("
            UPDATE tasks
            SET
                description = :description,
                due = :due,
                complete = :complete
                where id = :id
        ");

        $statement->execute([
            'id' => $task->getId(),
            'description' => $task->getDescription(),
            'due' => $task->getDue()->format('Y-m-d H:i:s'),
            'complete' => $task->getComplete() ? 1 : 0,
        ]);

        return $this->get($task->getId());
    }

    public function get($id)
    {
        $statement = $this->db->prepare("
            SELECT id, description, due, complete
            FROM tasks 
            where id = :id

        ");

        $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);

        $statement->execute([
            'id' => $id,
        ]);

        return $statement->fetch();
    }

    public function all()
    {
        $statement = $this->db->prepare("
            SELECT id, description, due, complete
            FROM tasks
        ");

        $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);

        $statement->execute();

        return $statement->fetchAll();
    }
}