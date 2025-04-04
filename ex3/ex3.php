<?php
include_once "autoload.php";
$pokemon1 = new PokemonFeu(
  "Pikachu",
  "images/pikachu.jpg",
  200,
  new AttackPokemon(10, 100, 2, 20)
);

$pokemon2 = new PokemonEau(
  "Bulbizarre",
  "images/bulbizarre.jpg",
  200,
  new AttackPokemon(30, 80, 4, 20)
);
$round = 1;
$pokemons = [$pokemon1, $pokemon2];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokemon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php
      $pokemons = [$pokemon1, $pokemon2];
      $round = 1;
    ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <div class="bg-info-subtle text-dark p-3 mb-3 rounded">
          Les combattants
        </div>
      </div>
    </div>
    <?php do { ?>
      <div class="row">
      <?php
        foreach ($pokemons as $p) {
        $atk = $p->getAttackPokemon();
        ?>
        <div class="col-md-6">
          <div class="card md-6 shadow-sm">
          <div class="card-header bg-light text-dark d-flex align-items-center gap-2">
            <h5 class="card-title mb-0"><?= $p->getName() ?></h5>
            <img src="<?= $p->getUrl() ?>" style="height: 140px; width: auto;" class="rounded">
          </div>

          <div class="card-body">
            <div class="p-2 mb-1 rounded">
              <p>Points : <?= $p->getHp() ?></p><hr>
              <p>Min Attack Points : <?= $atk->getAttackMinimal() ?></p><hr>
              <p>Max Attack Points : <?= $atk->getAttackMaximal() ?></p><hr>
              <p>Special Attack : <?= $atk->getSpecialAttack() ?></p><hr>
              <p>Probability Special Attack : <?= $atk->getProbabilitySpecialAttack() ?>%</p>
            </div>
          </div>
          </div>
        </div>
        <?php } 
          $degat1 = $pokemons[0]->attack($pokemons[1]);
          $degat2 = 0;
          if (!$pokemons[1]->isDead()) {
          $degat2 = $pokemons[1]->attack($pokemons[0]);}
        ?>

        <div class="row ">
        <div class="col-md-12">
      
        <div class="bg-danger-subtle p-3 rounded ">
        Round <?= $round ?>
          <div class="bg-secondary-subtle d-flex justify-content-around py-2 rounded">
            <div><?= $degat1 ?></div>
            <div><?= $degat2 ?></div>
          </div>
        </div>
    </div>
  </div>
  </div>
  <?php $round++;}
    while (!$pokemons[0]->isDead() && !$pokemons[1]->isDead());
    $winner = $pokemons[0]->getHp() > $pokemons[1]->getHp() ? $pokemons[0] : $pokemons[1];
  ?>

  <div class="alert alert-success d-flex align-items-center gap-2">
    Le vainqueur est :
    <div>
      <img src="<?= $winner->getUrl() ?>" style="height: 80px;" >
    </div>
  </div>
</div>

</body>
</html>