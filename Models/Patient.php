<?php
require_once 'DataBase.php';
/**
 * Description of Patient
 *
 * @author s albrecht
 */
class Patient extends DataBase{

    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $lastname;

    /**
     * @var type string
     */
    public $firstname;

    /**
     * @var type string
     */
    public $birthdate;

    /**
     * @var type string
     */
    public $phone;

    /**
     * @var type string
     */
    public $mail;
    /**
     * Le constructeur de la classe patient
     */
    public function __construct($first_name = '', $last_name = '', $birth_date = '', $telephone = '', $email = ''){
        parent::__construct();
        $this->firstname = $first_name;
        $this->lastname = $last_name;
        $this->birthdate = $birth_date;
        $this->phone = $telephone;
        $this->mail = $email;
        }
/**
 * 
 * @return boolean|$this
 */
    public function create() {
        // Le code pour créer un patient
        $query = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUE (:lastname, :firstname, :birthdate, :phone, :mail)"or die('Erreur SQL !' . $req . ' ' . mysql_error());
        $sth = $this->db->prepare($query);
        $sth->bindValue('lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue('firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue('birthdate', $this->birthdate, PDO::PARAM_STR);
        $sth->bindValue('phone', $this->phone, PDO::PARAM_STR);
        $sth->bindValue('mail', $this->mail, PDO::PARAM_STR);
        if($sth->execute()){
            return $this;
        }
        return false;
    }

    public function getAll() {
        //Le code sélectionnant tous les patients
    }

    public function getOneById() {
        //Le code sélectionnant un patient
    }

    public function delete() {
        //Le code pour supprimer un patient
    }

    public function update() {
        //
    }

}
