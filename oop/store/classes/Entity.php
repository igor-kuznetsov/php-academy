<?php

/**
 * Class Entity
 */
abstract class Entity
{
    protected $columns = [];

    /**
     * @return string
     */
    abstract protected static function getTable();

    /**
     * @return array
     */
    abstract protected static function getColumns();

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (in_array($name, static::getColumns()) && array_key_exists($name, $this->columns)) {
            return $this->columns[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if (in_array($name, static::getColumns())) {
            $this->columns[$name] = $value;
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        if (in_array($name, static::getColumns())) {
            return isset($this->columns[$name]);
        }

        return false;
    }

    /**
     * @param string $name
     */
    public function __unset($name)
    {
        if (in_array($name, static::getColumns()) && array_key_exists($name, $this->columns)) {
            unset($this->columns[$name]);
        }
    }

    /**
     * @return array
     */
    public static function getAll():array
    {
        $entities = [];
        $table = static::getTable();
        $db = DbManager::getInstance();

        $query = "SELECT * FROM `$table`;";

        foreach ($db->getPdo()->query($query) as $row) {
            $entities[] = new static($row);
        }

        return $entities;
    }

    /**
     * @param int $page
     * @return array
     */
    public static function getByPage($page):array
    {
        $entities = [];
        $table = static::getTable();
        $db = DbManager::getInstance();

        $offset = ($page - 1) * ITEMS_PER_PAGE;
        $limit = ITEMS_PER_PAGE;

        $query = "SELECT * FROM `$table` LIMIT $offset,$limit;";

        foreach ($db->getPdo()->query($query) as $row) {
            $entities[] = new static($row);
        }

        return $entities;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function getById($id)
    {
        $entity = null;
        $table = static::getTable();
        $db = DbManager::getInstance();
        $id = (int) $id;
        $query = "SELECT * FROM `$table` WHERE `id` = $id;";

        foreach ($db->getPdo()->query($query) as $row) {
            $entity = new static($row);
        }

        return $entity;
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public static function getByIds($ids)
    {
        $entities = [];
        $table = static::getTable();
        $db = DbManager::getInstance();
        $ids = implode(',', $ids);
        $query = "SELECT * FROM `$table` WHERE `id` IN ($ids);";

        foreach ($db->getPdo()->query($query) as $row) {
            $entities[] = new static($row);
        }

        return $entities;
    }

    /**
     * @param int $id
     */
    public static function deleteById($id)
    {
        $entity = null;
        $table = static::getTable();
        $db = DbManager::getInstance();

        $query = "DELETE FROM `$table` WHERE `id` = $id;";
        $db->getPdo()->query($query);
    }

    /**
     * @param array $data
     * @return bool
     */
    protected static function create($data)
    {
        $table = static::getTable();
        $columns = static::getColumns();
        $columnsArray = [];
        $valuesArray = [];

        foreach ($data as $key => $value) {
            if (in_array($key, $columns)) {
                $columnsArray[] = '`'.$key.'`';
                $valuesArray[] = "'".$value."'";
            }
        }

        $columnsList = implode(',', $columnsArray);
        $valuesList = implode(',', $valuesArray);

        $query = "INSERT INTO `$table` ($columnsList) VALUES ($valuesList);";

        $db = DbManager::getInstance();
        $st = $db->getPdo()->prepare($query);

        return $st->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    protected static function update($data)
    {
        if (isset($data['id'])) {
            $id = (int) $data['id'];

            $table = static::getTable();
            $columns = static::getColumns();
            $setArray = [];

            foreach ($data as $key => $value) {
                if (in_array($key, $columns)) {
                    $setArray[] = "`".$key."` = '".$value."'";
                }
            }

            $setList = implode(',', $setArray);

            $query = "UPDATE `$table` SET $setList WHERE `id` = $id;";

            $db = DbManager::getInstance();
            $st = $db->getPdo()->prepare($query);

            return $st->execute();
        }

        return false;
    }

    /**
     * @param string $file
     * @param array $attributes
     * @return string
     */
    public function getLink($file, $attributes = [])
    {
        $link = "$file?id=$this->id";
        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                $link .= "&$key=$value";
            }
        }

        return $link;
    }
}
