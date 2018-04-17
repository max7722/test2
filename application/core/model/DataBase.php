<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 20:57
 */

namespace application\core\model;


class DataBase
{
    private static $instance;

    private static $host = 'localhost';

    private static $dbname = 'my-shop';

    private static $user = 'root';

    private static $pass = '';

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname;
            $opt = [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC];

            self::$instance = new \PDO($dsn, self::$user, self::$pass, $opt);
        }

        return self::$instance;
    }
}