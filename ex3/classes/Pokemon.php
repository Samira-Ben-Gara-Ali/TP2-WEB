<?php
class Pokemon{
  private string $name;
  private string $url;
  private int $hp;
  protected AttackPokemon $attackPokemon;

  public function __construct(string $name, string $url, int $hp, AttackPokemon $attackPokemon) {
      $this->name = $name;
      $this->url = $url;
      $this->hp = $hp;
      $this->attackPokemon = $attackPokemon;
  }

  
  public function getName()
  {
    return $this->name;
  }

  
  public function setName($name)
  {
    $this->name = $name;
    
    return $this;
  }
 
  public function getUrl()
  {
    return $this->url;
  }

 
  public function setUrl($url)
  {
    $this->url = $url;

    return $this;
  }

 
  public function getHp()
  {
    return $this->hp;
  }

 
  public function setHp($hp)
  {
    $this->hp = $hp;

    return $this;
  }

  
  public function getAttackPokemon()
  {
    return $this->attackPokemon;
  }

 
  public function setAttackPokemon($attackPokemon)
  {
    $this->attackPokemon = $attackPokemon;

    return $this;
  }
  public function isDead(){
    return $this->hp <= 0;
  }
  public function attack(Pokemon $p){
    $atk=$this->attackPokemon->getAttackMinimal();
    $random = rand(1, 100);
    if ($random <= $this->attackPokemon->getProbabilitySpecialAttack()) {
        $atk *= $this->attackPokemon->getSpecialAttack();}
        
    $atk=min($atk,$this->attackPokemon->getAttackMaximal());
    $p->setHp($p->getHp()-$atk);
    return $atk;
    
  }

  public function whoAmI() {
    echo "Nom : " . $this->name . "\n";
    echo "Image : " . $this->url . "\n";
    echo "HP : " . $this->hp . "\n";
    echo "Infos Attaque :\n";
    $this->attackPokemon->afficheAttackInfo();
    
}

}