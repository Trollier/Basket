<?php

class TeamsCalendar {

    private $idCalendar;
    private $idTeam;
    private $yearTeam;
    private $inTeam;
    private $outTeam;
    private $scoreIn;
    private $scoreOut;
    private $modified;
    private $matchNumber;
    private $dateMatch;
    private $timeMatch;
    private $TypeMatch;
    private $label;

    function getIdCalendar() {
        return $this->idCalendar;
    }

    function getIdTeam() {
        return $this->idTeam;
    }

    function getYearTeam() {
        return $this->yearTeam;
    }

    function getInTeam() {
        return $this->inTeam;
    }

    function getOutTeam() {
        return $this->outTeam;
    }

    function getScoreIn() {
        return $this->scoreIn;
    }

    function getScoreOut() {
        return $this->scoreOut;
    }

    function getModified() {
        return $this->modified;
    }

    function getMatchNumber() {
        return $this->matchNumber;
    }

    function getDateMatch() {
        return $this->dateMatch;
    }

    function getTimeMatch() {
        return $this->timeMatch;
    }

    function getTypeMatch() {
        return $this->TypeMatch;
    }

    function getLabel() {
        return $this->label;
    }

    function setIdCalendar($idCalendar) {
        $this->idCalendar = $idCalendar;
    }

    function setIdTeam($idTeam) {
        $this->idTeam = $idTeam;
    }

    function setYearTeam($yearTeam) {
        $this->yearTeam = $yearTeam;
    }

    function setInTeam($inTeam) {
        $this->inTeam = $inTeam;
    }

    function setOutTeam($outTeam) {
        $this->outTeam = $outTeam;
    }

    function setScoreIn($scoreIn) {
        $this->scoreIn = $scoreIn;
    }

    function setScoreOut($scoreOut) {
        $this->scoreOut = $scoreOut;
    }

    function setModified($modified) {
        $this->modified = $modified;
    }

    function setMatchNumber($matchNumber) {
        $this->matchNumber = $matchNumber;
    }

    function setDateMatch($dateMatch) {
        $this->dateMatch = $dateMatch;
    }

    function setTimeMatch($timeMatch) {
        $this->timeMatch = $timeMatch;
    }

    function setTypeMatch($TypeMatch) {
        $this->TypeMatch = $TypeMatch;
    }

    function setLabel($label) {
        $this->label = $label;
    }

}
