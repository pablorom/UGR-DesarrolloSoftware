<?php
    class db{
        //Propiedades
        private $dbHost = 'localhost';
        private $dbUser = 'ds_app';
        private $dbPass = 'pass';
        private $dbName = 'DS';

        //Conectar 
        public function connectDB(){
            $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
            $dbConnection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }