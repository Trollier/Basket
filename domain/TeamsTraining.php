<?php

class TeamsTraining {

    private $idTraining;
    private $idTeam;
    private $currentYear;
    private $dayOfWeek;
    private $startTime;
    private $endTime;
    private $room;
    private $labelDay;
    private $label;

    function getIdTraining() {
        return $this->idTraining;
    }

    function getIdTeam() {
        return $this->idTeam;
    }

    function getCurrentYear() {
        return $this->currentYear;
    }

    function getDayOfWeek() {
        return $this->dayOfWeek;
    }

    function getStartTime() {
        return $this->startTime;
    }

    function getEndTime() {
        return $this->endTime;
    }

    function getRoom() {
        return $this->room;
    }

    function getLabelDay() {
        return $this->labelDay;
    }

    function getLabel() {
        return $this->label;
    }

    function setIdTraining($idTraining) {
        $this->idTraining = $idTraining;
    }

    function setIdTeam($idTeam) {
        $this->idTeam = $idTeam;
    }

    function setCurrentYear($currentYear) {
        $this->currentYear = $currentYear;
    }

    function setDayOfWeek($dayOfWeek) {
        $this->dayOfWeek = $dayOfWeek;
    }

    function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    function setEndTime($endTime) {
        $this->endTime = $endTime;
    }

    function setRoom($room) {
        $this->room = $room;
    }

    function setLabelDay($labelDay) {
        $this->labelDay = $labelDay;
    }

    function setLabel($label) {
        $this->label = $label;
    }

}
