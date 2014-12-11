<?php

class Player {

    private $idPlayer;
    private $name;
    private $firstname;
    private $birthdate;
    private $email;
    private $active;

    public function getIdPlayer() {
        return $this->idPlayer;
    }

    public function getName() {
        return $this->name;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getActive() {
        return $this->active;
    }

    public function setIdPlayer($idPlayer) {
        $this->idPlayer = $idPlayer;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function validate() {
        
        return strlen($this->name) > 2 && strlen($this->name) < 20 && strlen($this->firstname) > 2 && strlen($this->firstname) < 20 &&
                filter_var($this->email, FILTER_VALIDATE_EMAIL) &&
                preg_match('/^[\pL\p{Mc} \'-]+$/u', $this->name) &&
                preg_match('/^[\pL\p{Mc} \'-]+$/u', $this->firstname);
    }

}
