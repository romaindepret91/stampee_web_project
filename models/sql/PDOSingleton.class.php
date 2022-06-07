<?php
 
class PDOSingleton extends \PDO {
    private static $instance = null;

    const DB_SERVEUR  = 'localhost';
    const DB_NOM      = 'projet-web-1'; // const DB_NOM      = 'e2195318';
    const DB_DSN      = 'mysql:host='. self::DB_SERVEUR .';dbname='. self::DB_NOM.';charset=utf8'; 
    const DB_LOGIN    = 'root'; // const DB_LOGIN    = 'e2195318';
    const DB_PASSWORD = 'root'; // const DB_PASSWORD = 'IUrGPqcQ7tkvGcgx2Dzc';
   

    private function __construct() {
        
      $options = [
        \PDO::ATTR_ERRMODE           => \PDO::ERRMODE_EXCEPTION,  // Gestion des erreurs par des exceptions de la classe PDOException
        \PDO::ATTR_EMULATE_PREPARES  => false                     // Préparation des requêtes non émulée
      ];
      parent::__construct(self::DB_DSN, self::DB_LOGIN, self::DB_PASSWORD, $options);
    }
  
    private function __clone (){}  

    public static function getInstance() {  
      if(is_null(self::$instance))
      {
        self::$instance = new PDOSingleton();
      }
      return self::$instance;
    }
}
