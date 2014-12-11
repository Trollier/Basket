<?php

class DaysOfWeek {
   
   private $idDay ;
   private $label;
   
   function getIdDay() {
       return $this->idDay;
   }

   function getLabel() {
       return $this->label;
   }

   function setIdDay($idDay) {
       $this->idDay = $idDay;
   }

   function setLabel($label) {
       $this->label = $label;
   }


   
}
