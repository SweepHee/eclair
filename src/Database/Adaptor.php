<?php

namespace Eclair\Database;

class Adaptor
{
    static $pdo;

    private static $sth;

    public static function setup($dsn, $username, $password)
    {
        self::$pdo = new \PDO($dsn, $username, $password);
    }

    public static function exec($query, $params = [])
    {
        if (self::$sth = self::$pdo->prepare($query)) {
            return self::$sth->execute($params);
        }
    }

    public static function getAll($query, $params =[], $classname = 'stdClass')
    {
        if (self::exec($query, $params)) {
            return self::$sth->fetchAll(\PDO::FETCH_CLASS, $classname);
        }
    }

}