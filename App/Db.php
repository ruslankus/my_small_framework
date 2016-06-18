<?php

namespace App;


class Db
{

    use Singleton;

    protected $_dbName =  'myframe';
    protected $_dbUser = 'root';
    protected $_dbPass = 'mysql';
    protected $_dbHost = '127.0.0.1';

    protected $dbh;

    protected function __construct()
    {
        try {
            $dbh = new \PDO("mysql:host={$this->_dbHost};dbname={$this->_dbName}", $this->_dbUser, $this->_dbPass,
                [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);

            $this->dbh = $dbh;
        } catch (\PDOException $e){
           throw new \App\Exceptions\Db($e->getMessage(),$e->getCode());
           die();
        }
    }


    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }


    public function query($sql,$params,$class){
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if(false !== $res){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        return [];
    }

}