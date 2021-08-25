<?php

require 'controllers/controller.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Hospital</title>
</head>

<body>

  <div class="container-fluid centerPage align-items-center ">
    <H1 class="text-center text-white">Liste des rendez-vous</H1>
    <?php foreach ($displayAppointmentsArray as $appointments) { ?>
    <div class="card mb-3 shadowblock" style="width: 40%;">
      <div class="row g-0">
        <div class="col-md-5">
          <div class="card-body">
            <h4 class="card-title"><?= $appointments['lastname'] ?></h4>
            <p class="card-text"><?= $appointments['firstname'] ?></p>
            <p class="card-text"><small class="text-muted"><?= $appointments['dateHour'] ?></small></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-body">
            <form action="detail-rendezvous.php" method="post">
              <button type="submit" class="btn bi bi-pencil ms-2" name="detailApp"
                value="<?php echo $appointments['idApp'];?>"> Détails</button>
            </form>
            <form action="" method="post">
              <button type="submit" class="btn bi bi-trash ms-2" name="idAppToDelete"
                value="<?php echo $appointments['idApp'];?>"> Supprimer</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <div class="d-flex justify-content-center">
    <a href="ajout-rendezvous.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Ajouter
      un nouveau rendez-vous</a>
  </div>

  <div class="d-flex justify-content-center">
    <a href="index.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Accueil</a>
  </div>


</body>
</html>