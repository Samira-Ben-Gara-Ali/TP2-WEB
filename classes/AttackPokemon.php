<?php 
class AttackPokemon{
  
  public function __construct(private int $attackMinimal,
  private int $attackMaximal,
  private int $specialAttack,
  private int $probabilitySpecialAttack)
  {}

  
  public function getAttackMinimal()
  {
    return $this->attackMinimal;
  }

 
  public function setAttackMinimal($attackMinimal)
  {
    $this->attackMinimal = $attackMinimal;

    return $this;
  }

  
  public function getAttackMaximal()
  {
    return $this->attackMaximal;
  }

  
  public function setAttackMaximal($attackMaximal)
  {
    $this->attackMaximal = $attackMaximal;

    return $this;
  }

  public function getSpecialAttack()
  {
    return $this->specialAttack;
  }

  
  public function setSpecialAttack($specialAttack)
  {
    $this->specialAttack = $specialAttack;

    return $this;
  }

   
  public function getProbabilitySpecialAttack()
  {
    return $this->probabilitySpecialAttack;
  }

  
  public function setProbabilitySpecialAttack($probabilitySpecialAttack)
  {
    $this->probabilitySpecialAttack = $probabilitySpecialAttack;

    return $this;
  }
  public function afficheAttackInfo() {
    echo "- Degats minimum : " . $this->attackMinimal . "\n";
    echo "- Degats maximum : " . $this->attackMaximal . "\n";
    echo "- Coefficient attaque speciale : " . $this->specialAttack . "\n";
    echo "- Probabilite attaque speciale : " . $this->probabilitySpecialAttack . "%\n";
}

}