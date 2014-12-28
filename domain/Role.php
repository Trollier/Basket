<?php
class Role {
 private $name;
 private $firstname;
 private $label;
 private $idUser;
 private $idRoleType;
 private $idRole;
 
 function getName() {
     return $this->name;
 }

 function getFirstname() {
     return $this->firstname;
 }

 function getLabel() {
     return $this->label;
 }
 function getIdRole() {
     return $this->idRole;
 }

 function setIdRole($idRole) {
     $this->idRole = $idRole;
 }

  function getIdUser() {
     return $this->idUser;
 }

 function getIdRoleType() {
     return $this->idRoleType;
 }

 function setName($name) {
     $this->name = $name;
 }

 function setFirstname($firstname) {
     $this->firstname = $firstname;
 }

 function setLabel($label) {
     $this->label = $label;
 }

 function setIdUser($idUser) {
     $this->idUser = $idUser;
 }

 function setIdRoleType($idRoleType) {
     $this->idRoleType = $idRoleType;
 }


}
