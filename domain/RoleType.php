<?php

   
class RoleType {

    private $roleTypeId;
    private $label;
    private $ordre;
    private $active;
    
    public function getRoleTypeId() {
        return $this->roleTypeId;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getOrdre() {
        return $this->ordre;
    }

    public function getActive() {
        return $this->active;
    }

    public function setRoleTypeId($roleTypeId) {
        $this->roleTypeId = $roleTypeId;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setOrdre($ordre) {
        $this->ordre = $ordre;
    }

    public function setActive($active) {
        $this->active = $active;
    }


}


