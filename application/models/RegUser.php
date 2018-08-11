<?php

namespace application\models;

use application\core\model\RecordPrototype;

/**
 * Class Delivery
 * @property int id
 * @property string name
 * @property string password
 * @property string mail
 * @property string hash
 * @property string time_reg
 */
class RegUser extends RecordPrototype
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'register_user';
    }

    /**
     * @return array
     */
    public static function fields()
    {
        return ['id', 'name', 'password', 'mail', 'hash', 'time_reg'];
    }
}