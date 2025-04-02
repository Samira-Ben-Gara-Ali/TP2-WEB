<?php

class Etudiant {
  private string $nom;
  private array $notes;

  public function __construct(string $nom, array $notes) {
      $this->nom = $nom;
      $this->notes = $notes;
  }

    public function afficherNotes()
    {
      echo "$this->nom: ".implode(", ", $this->notes);
    }

    public function calculMoyenne(){
      $s=0;
      foreach($this->notes as $note){
          $s+=$note;
      }
      if ($s==0) {
        return 0;
      }

      return $s / count($this->notes);
    }

    public function estAdmis(){
      $moyenne=$this->calculMoyenne();
      if ($moyenne>=10){
        return "Admis";
      }
      else{
        return "Non Admis";
      }
    }
    public function getNom(){
      return $this->nom;
    }
    public function getNotes(){
      return $this->notes;
    }
    
}