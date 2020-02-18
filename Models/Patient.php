<?php

require_once 'DataBase.php';

/**
 * Description of Patient
 *
 * @author s albrecht
 */
class Patient extends DataBase {

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
    public function __construct($first_name = '', $last_name = '', $birth_date = '', $telephone = '', $email = '') {
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
        if ($sth->execute()) {
            return $this;
        }
        return false;
    }
/**
 * cette methode permet de recuperer tous les patients de la clinique
 * @return type array
 */
    public function getAll() {
        $sql = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS birthdate, `phone`, `mail` FROM `patients`';
        $usersList = [];
        $sth = $this->db->query($sql);
        if ($sth instanceOf PDOStatement) {
            // Collection des données dans un tableau associatif (FETCH_ASSOC)
            $usersList = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        return $usersList;
    }
/**
 * cette methode permet de recupérer un patient dans la bdd si il existe
 * @return boolean|$this
 */
    public function getOneById() {
        //Le code sélectionnant un patient
        $sql = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS birthdate, `phone`, `mail` FROM `patients` WHERE `id` = :id';
        $sth =$this->db->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($sth->execute()){//hydrate la fonction, lui attribut des nouvelles valeurs
            $patient = $sth->fetch(PDO::FETCH_OBJ);
            if($patient){
            $this->firstname = $patient->firstname;
            $this->lastname = $patient->lastname;
            $this->birthdate = $patient->birthdate;
            $this->phone = $patient->phone;
            $this->mail = $patient->mail;
            return $this;
        }
    }
       return false;
    }

    public function delete() {
        //Le code pour supprimer un patient
    }

    public function update() {
        //
    }

}
