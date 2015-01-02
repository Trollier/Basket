<?php

class TeamsRanking {
    
private $idRanking;
private $idTeam;
private $myYear;
private $name;
private $played;
private $win;
private $lost;
private $deuce;
private $points;
private $dateRanking;

function getIdRanking() {
    return $this->idRanking;
}

function getIdTeam() {
    return $this->idTeam;
}

function getMyYear() {
    return $this->myYear;
}

function getName() {
    return $this->name;
}

function getPlayed() {
    return $this->played;
}

function getWin() {
    return $this->win;
}

function getLost() {
    return $this->lost;
}

function getDeuce() {
    return $this->deuce;
}

function getPoints() {
    return $this->points;
}

function getDateRanking() {
    return $this->dateRanking;
}

function setIdRanking($idRanking) {
    $this->idRanking = $idRanking;
}

function setIdTeam($idTeam) {
    $this->idTeam = $idTeam;
}



function setMyYear($myYear) {
    $this->myYear = $myYear;
}

function setName($name) {
    $this->name = $name;
}

function setPlayed($played) {
    $this->played = $played;
}

function setWin($win) {
    $this->win = $win;
}

function setLost($lost) {
    $this->lost = $lost;
}

function setDeuce($deuce) {
    $this->deuce = $deuce;
}

function setPoints($points) {
    $this->points = $points;
}

function setDateRanking($dateRanking) {
    $this->dateRanking = $dateRanking;
}


}
