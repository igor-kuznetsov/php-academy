<?php

namespace Advanced\API\Classes;

class Tasks extends AbstractDbEntity
{
    public $task;
    public $user_id;
    public $status;

    public function create()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 201
        ];

        $sql = "INSERT INTO `tasks`(`task`,`user_id`,`status`) 
                VALUES ('$this->task',$this->user_id,1);";
        $query = $this->query($sql);

        if (!$query) {
            $result['success'] = false;
            $result['errors'][] = 'Failed to create task';
            $result['status'] = 200;
        }

        return $result;
    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function validate($data)
    {
        $validator = [
            'success' => true,
            'errors' => [],
            'status' => 200
        ];

        return $validator;
    }

    public function all()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 200
        ];

        $sql = "SELECT * FROM `tasks`;";
        $result['data'] = $this->query($sql);

        return $result;
    }
}