<?php

namespace ishop;
//use \RedBeanPHP\R as R;
class Db{

    use TSingletone;

    protected function __construct(){
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if( !\R::testConnection() ){
            throw new \Exception("Нет соединения с базой данных");
        }
        \R::freeze(true);
        if(DEBUG) {
            \R::debug(true, 1);
        }
    }

}