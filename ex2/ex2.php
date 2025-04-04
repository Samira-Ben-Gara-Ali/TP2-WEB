<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sessions</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<?php
    include_once 'Session.php';
    $session = Session::getInstance();

    if (isset($_POST['reset'])) {
        $session->destroy();
    }

    $session->increment();
    $nb = $session->getNbVisite();

    if ($nb == 1) {
        echo "<div class='alert alert-primary'>Bienvenue à notre plateforme.</div>";
    } else {
        echo "<div class='alert alert-success'>Merci pour votre fidélité, c’est votre $nb éme visite.</div>";
    }
  ?>

  <form method="post">
    <button type="submit" name="reset" class="btn btn-danger mt-3">Réinitialiser la session</button>
  </form>
</body>
</html>