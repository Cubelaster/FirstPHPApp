<?php 
    class DbContextFactory {
        private static $instance = NULL;
        private static $dbName = "FirstPHPAppDB";
        private static $userName = "sa";
        private static $password = "Password11__";
        private function __construct() {}
        private function __clone() {}

        public static function getDbContextInstance() {
            if(!isset (self::$instance)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self:: $instance = new PDO("sqlsrv:Server=DESKTOP-M9BFD6K;Database=FirstPHPAppDB", "sa", "Password11__");
            }
            return self::$instance;
        }
    }
?>