<?php


class Teams {
  
private $idTeam;
private $label;
private $ageMin;
private $ageMax;
private $godFather;
private $name;
private $ordre;
private $active;
private $firstname;

function getName() {
    return $this->name;
}
function getFirstname() {
    return $this->firstname;
}

function setFirstname($firstname) {
    $this->firstname = $firstname;
}

function setName($name) {
    $this->name = $name;
}

function getIdTeam() {
    return $this->idTeam;
}

function getLabel() {
    return $this->label;
}

function getAgeMin() {
    return $this->ageMin;
}

function getAgeMax() {
    return $this->ageMax;
}

function getGodFather() {
    return $this->godFather;
}

function getOrdre() {
    return $this->ordre;
}

function getActive() {
    return $this->active;
}

function setIdTeam($idTeam) {
    $this->idTeam = $idTeam;
}

function setLabel($label) {
    $this->label = $label;
}

function setAgeMin($ageMin) {
    $this->ageMin = $ageMin;
}

function setAgeMax($ageMax) {
    $this->ageMax = $ageMax;
}

function setGodFather($godFather) {
    $this->godFather = $godFather;
}

function setOrdre($ordre) {
    $this->ordre = $ordre;
}

function setActive($active) {
    $this->active = $active;
}


}
