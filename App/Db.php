<?php

namespace App;


class Db
{
    protected $_dbName =  'myframe';
    protected $_dbUser = 'root';
    protected $_dbPass = 'mysql';
    protected $_dbHost = '127.0.0.1';

    protected $dbh;

    function __construct()
    {
        $this->dbh = new \PDO("mysql:host={$this->_dbHost};dbname={$this->_dbName}", $this->_dbUser, $this->_dbPass);
    }


    public function execute($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        return $res;
    }


    public function query($sql, $class){
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if(false !== $res){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        return [];
    }

}