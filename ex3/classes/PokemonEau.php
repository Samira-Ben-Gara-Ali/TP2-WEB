<?php
class PokemonEau extends Pokemon{
  public function __construct(string $name, string $url, int $hp, AttackPokemon $attackPokemon) {
    parent::__construct($name, $url, $hp, $attackPokemon);
  }
  public function attack(Pokemon $p){
  $atk=$this->attackPokemon->getAttackMinimal();
  $random = rand(1, 100);
  if ($random <= $this->attackPokemon->getProbabilitySpecialAttack()) {
      $atk *= $this->attackPokemon->getSpecialAttack();}
      
  $atk=min($atk,$this->attackPokemon->getAttackMaximal());
  
  if ($p instanceof PokemonFeu) {
    $atk *= 2;
  } elseif ($p instanceof PokemonPlante || $p instanceof PokemonEau) {
    $atk *= 0.5;
  }
  $p->setHp($p->getHp()-$atk);
  return $atk;
}}