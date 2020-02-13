<?php
require_once '../params.php';
/**
 * Description of DataBase
 *
 * @author s albrecht
 */
class DataBase {
   protected $db;
   public function __construct(){
       
    $dsn = 'mysql:dbname=' . DB . ';host=' . HOST;
    try {
        $this->db = new PDO($dsn, USER, PASSWD, ['PDO::ATTR_ERRMODE'=> 'PDO::ERRMODE_EXCEPTION']);
    } catch (Exception $ex) {
        die('La connexion à la bdd a échoué !');
    }
   }
}
