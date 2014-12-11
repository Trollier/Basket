<?php

   
class Staff {

    private $idStaff;
    private $label;
    private $ordre;
    private $showInMenu;
    private $active;
    
    
    public function getIdStaff() {
        return $this->idStaff;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getOrdre() {
        return $this->ordre;
    }

    public function getShowInMenu() {
        return $this->showInMenu;
    }

    public function getActive() {
        return $this->active;
    }

    public function setIdStaff($idStaff) {
        $this->idStaff = $idStaff;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setOrdre($ordre) {
        $this->ordre = $ordre;
    }

    public function setShowInMenu($showInMenu) {
        $this->showInMenu = $showInMenu;
    }

    public function setActive($active) {
        $this->active = $active;
    }


    
}


