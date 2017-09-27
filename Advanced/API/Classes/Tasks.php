<?php

namespace Advanced\API\Classes;

class Tasks extends AbstractDbEntity
{
    public $id;
    public $task;
    public $user_id;
    public $status;

    public function create()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 201,
            'data' => []
        ];

        $sql = "INSERT INTO `tasks`(`task`,`user_id`,`status`) 
                VALUES ('$this->task',$this->user_id,1);";
        $query = $this->query($sql);

        if ($query) {
            $sql = "SELECT LAST_INSERT_ID() AS `id`;";
            $query = $this->query($sql);
            if (!empty($query[0]['id'])) {
                $this->id = (int) $query[0]['id'];
                $result = $this->read();
            }
        } else {
            $result['success'] = false;
            $result['errors'][] = 'Failed to create task';
            $result['status'] = 200;
        }

        return $result;
    }

    public function read()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        $sql = "SELECT * FROM `tasks` WHERE `id` = $this->id;";
        $result['data'] = $this->query($sql);

        return $result;
    }

    public function update()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        $sql = "UPDATE `tasks` 
                SET `task`='$this->task',
                    `status`=$this->status
                WHERE `id` = $this->id;";
        $query = $this->query($sql);

        if (!$query) {
            $result['success'] = false;
            $result['errors'][] = 'Failed to update task';
            $result['status'] = 200;
        }

        return $result;
    }

    public function delete()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        $sql = "DELETE FROM `tasks` WHERE `id` = $this->id;";
        $query = $this->query($sql);

        if (!$query) {
            $result['success'] = false;
            $result['errors'][] = 'Failed to delete task';
            $result['status'] = 200;
        }

        return $result;
    }

    public function validate($data)
    {
        $validator = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        return $validator;
    }

    public function all()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        $sql = "SELECT * FROM `tasks`;";
        $result['data'] = $this->query($sql);

        return $result;
    }
}