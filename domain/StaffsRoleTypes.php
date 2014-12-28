<?php

class StaffsRoleTypes {
   private $active;
   private $stafflabel;
   private $ordre;
   private $showInMenu;
   private $idRoleType;
   private $idStaff;
   private $rolelabel;
   private $idStaffRoleType;
   
   function getIdStaffRoleType() {
       return $this->idStaffRoleType;
   }

   function setIdStaffRoleType($idStaffRoleType) {
       $this->idStaffRoleType = $idStaffRoleType;
   }

      function getActive() {
       return $this->active;
   }

   function getStafflabel() {
       return $this->stafflabel;
   }

   function getOrdre() {
       return $this->ordre;
   }

   function getShowInMenu() {
       return $this->showInMenu;
   }

   function getIdRoleType() {
       return $this->idRoleType;
   }

   function getIdStaff() {
       return $this->idStaff;
   }

   function getRolelabel() {
       return $this->rolelabel;
   }

   function setActive($active) {
       $this->active = $active;
   }

   function setStafflabel($stafflabel) {
       $this->stafflabel = $stafflabel;
   }

   function setOrdre($ordre) {
       $this->ordre = $ordre;
   }

   function setShowInMenu($showInMenu) {
       $this->showInMenu = $showInMenu;
   }

   function setIdRoleType($idRoleType) {
       $this->idRoleType = $idRoleType;
   }

   function setIdStaff($idStaff) {
       $this->idStaff = $idStaff;
   }

   function setRolelabel($rolelabel) {
       $this->rolelabel = $rolelabel;
   }


   
}
