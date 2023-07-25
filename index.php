<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calcul IMC</title>
  <link rel="stylesheet" href="./bulma.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title">Calcul <span>d'IMC </span></h1>

      <form action="./actions/form.php" method="get">
        <div class="field">
          <label class="label" for="height">Votre taille en centimètres</label>
          <div class="control">
            <input type="number" placeholder="Votre taille en centimètres" name="height" id="height" class="input" />
          </div>
        </div>

        <div class="field">
          <label class="label" for="weight">Votre poids en kg</label>
          <div class="control">
            <input type="number" placeholder="Votre poids en kg" name="weight" id="weight" class="input" />
          </div>
        </div>

        <div class="field">
          <div class="control">
            <input type="submit" value="Calculer un IMC" class="button is-link">
          </div>
        </div>
      </form>

      <?php
      // Récupérer les valeurs passées dans l'URL
      $bmi = isset($_GET['bmi']) ? $_GET['bmi'] : 0;
      $result = isset($_GET['result']) ? $_GET['result'] : "En attente du résultat...";
      ?>

      <div class="info">
        <p class="bmi-value"><?= $bmi ?></p>
        <p class="result"><?= $result ?></p>
      </div>
    </div>
  </section>
</body>

</html>