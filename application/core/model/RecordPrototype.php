<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 20:58
 */

namespace application\core\model;


abstract class RecordPrototype
{
    private $aAttribute = [];

    private $aOldAttribute;

    /**
     * @return string
     */
    protected static function tableName()
    {
        return '';
    }

    /**
     * @return array
     */
    protected static function fields()
    {
        return [];
    }

    public function __set($name, $value)
    {
        $sMethod = 'set' . ucfirst($name);

        if (method_exists(static::class, $sMethod)) {
            $this->$sMethod($value);
        }

        if (in_array($name, static::fields())) {
            $this->aAttribute[$name] = $value;
        }
    }

    public function __get($name)
    {
        $sMethod = 'get' . ucfirst($name);

        if (method_exists(static::class, $sMethod)) {
            return $this->$sMethod();
        }

        if (key_exists($name, $this->aAttribute)) {
            return $this->aAttribute[$name];
        }

        if (@key_exists($name, $this->aOldAttribute)) {
            return $this->aOldAttribute[$name];
        }

        return null;
    }

    public function __construct($params = [])
    {
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                if (in_array($key, static::fields())) {
                    $this->aOldAttribute[$key] = $value;
                }
            }
        }
    }

    /**
     * @param $sql
     * @return bool
     */
    public static function execute($sql) {
        try {
            $db = DataBase::getInstance();

            $db->exec($sql);
            $db->commit();

            return true;
        } catch(\Exception $e) {
            return false;
        }
    }

    /**
     * @param $param
     * @return static
     */
    public static function findOne($param)
    {
        $db = DataBase::getInstance();

        $aValues = null;

        if (is_numeric($param)) {
            $oQuery = $db->prepare('SELECT * FROM `' . static::tableName() . '` WHERE `id` = :id');
            $oQuery->bindValue(':id', $param);
        } elseif (is_array($param)) {
            $aFields = array_keys($param);
            $aValues = array_values($param);
            $sFields = implode(' = ? AND ', $aFields) . ' = ?';

            $oQuery = $db->prepare('SELECT * FROM `' . static::tableName() . '` WHERE ' . $sFields);
        }

        if (!$oQuery->execute($aValues)) {
            return null;
        }

        $oObject = new static($oQuery->fetch());

        return $oObject;
    }

    /**
     * @param int $param
     * @return static[]
     */
    public static function findAll($param = 0, $limit = 0, $offset = 0)
    {
        $db = DataBase::getInstance();

        $aValues = null;

        $sAppendedLimit = '';
        if (is_numeric($limit) && $limit > 0) {
            $sAppendedLimit .= $limit;
        }

        if (is_numeric($offset) && $offset > 0) {
            $sAppendedLimit = $offset . ', ' . $sAppendedLimit;
        }

        if ($sAppendedLimit) {
            $sAppendedLimit = ' LIMIT ' . $sAppendedLimit;
        }

        if ($param) {
            if (is_array($param)) {
                $aIdItems = $param;
            } else {
                $aIdItems[]['id'] = $param;
            }

            $aFields = array_keys($aIdItems);
            $aValues = array_values($aIdItems);
            $sFields = implode(' = ? AND ', $aFields) . ' = ?';

            $oQuery = $db->prepare('SELECT * FROM `' . static::tableName() . '` WHERE ' . $sFields .
                $sAppendedLimit);
        } else {
            $oQuery = $db->prepare('SELECT * FROM `' . static::tableName() . '` WHERE 1' .
                $sAppendedLimit);
        }

        if (!$oQuery->execute($aValues)) {
            return null;
        }

        $aQueryResult = [];
        foreach ($oQuery->fetchAll() as $item) {
            $aQueryResult[] = new static($item);
        }

        return $aQueryResult;
    }

    /**
     * @param $param
     * @return bool
     */
    public static function deleteAll($param)
    {
        if (!is_array($param)) {
            return False;
        }

        $db = DataBase::getInstance();

        $aFields = array_keys($param);
        $aValues = array_values($param);
        $sFields = implode(' = ?, ', $aFields) . ' = ?';

        $oQuery = $db->prepare('DELETE FROM `' . static::tableName() . '` WHERE ' . $sFields);

        return $oQuery->execute($aValues);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        if (empty($this->aOldAttribute)) {
            return False;
        }

        $db = DataBase::getInstance();

        $oQuery = $db->prepare('DELETE FROM `' . static::tableName() . '` WHERE id = ?');

        return $oQuery->execute([$this->aOldAttribute['id']]);
    }

    /**
     * @return bool
     */
    public function initSave()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (!$this->initSave()) {
            return false;
        }

        if (isset($this->aOldAttribute)) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    /**
     * @return bool
     */
    protected function update()
    {
        $db = DataBase::getInstance();

        $aFields = array_keys($this->aAttribute);
        $aValues = array_values($this->aAttribute);
        $sFields = implode(' = ?, ', $aFields) . ' = ?';

        $oQuery = $db->prepare('UPDATE ' . static::tableName() . ' SET ' . $sFields .
            ' WHERE id = ' . $this->aOldAttribute['id']);

        if (!$oQuery->execute($aValues)) {
            return false;
        }

        $sQueryForObject = 'SELECT * FROM `' . static::tableName() . '` WHERE id = ' . $this->id;
        $this->aOldAttribute = $db->query($sQueryForObject)->fetch();

        return true;
    }

    /**
     * @return bool
     */
    protected function insert()
    {
        if (!$this->aAttribute) {
            return False;
        }

        $db = DataBase::getInstance();

        $aFields = array_keys($this->aAttribute);
        $aValues = array_values($this->aAttribute);
        $sFields = implode(', ', $aFields);

        $str = str_repeat('?,', count($aFields) - 1) . '?';

        $oQuery = $db->prepare('INSERT INTO `' . static::tableName() . '` (' . $sFields . ') VALUES (' . $str . ')');

        if (!$oQuery->execute($aValues)) {
            return false;
        }

        $sQueryForId = 'SELECT id FROM `' . static::tableName() . '` ORDER BY id DESC';
        $idCurrent = $db->query($sQueryForId)->fetch()['id'];

        $this->id = $idCurrent;

        $sQueryForObject = 'SELECT * FROM `' . static::tableName() . '` WHERE id = ' . $idCurrent;

        $this->aOldAttribute = $db->query($sQueryForObject)->fetch();
        $this->aAttribute = [];

        return true;
    }

}
