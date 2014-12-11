<?php

class DaysOfWeek {
   
   private $idDay ;
   private $Label;
   
   function getIdDay() {
       return $this->idDay;
   }

   function getLabel() {
       return $this->Label;
   }

   function setIdDay($idDay) {
       $this->idDay = $idDay;
   }

   function setLabel($label) {
       $this->Label = $label;
   }


   
}
