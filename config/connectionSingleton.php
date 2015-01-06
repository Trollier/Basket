
<?php

class ConnectionSingleton {
    /* Connexion � une base de donn�es ODBC en invoquant un driver */

    var $dsn = 'mysql:dbname=basketproject;host=127.0.0.1;charset=utf8';
    var $user = 'root';
    var $password = '';
    var $dbh;
    private static $instance = null;

    private function __construct() {

        try {
            
            
            $this->dbh = new PDO($this->dsn, $this->user, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Echec de la connexion : ' . $e->getMessage();
        }
    }

    public static function getPDO() {
        if (is_null(self::$instance)) {
            self::$instance = new ConnectionSingleton();
        }
        return self::$instance->dbh;
    }

}


