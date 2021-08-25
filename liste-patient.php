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

  <div class="container-fluid centerPage align-items-center">
    <H1 class="text-center text-white">Liste des patients</H1>

    <div class="row justify-content-center">
      <div class="col-3 mt-2">
        <form class="d-flex justify-content-center" method="post">
          <input class="form-control me-2" type="search" placeholder="Rechercher un patient" name="search" aria-label="Search">
          <button class="btn btn-outline-white text-dark border-dark" type="submit" name="validsearch">Rechercher</button>
        </form>
      </div>
    </div>


    <?php foreach ($displayPatientsPagesArray  as $patients) { ?>
    <div class="card mb-3 shadowblock" style="width: 40%;">
      <div class="row g-0">
        <div class="col-md-5">
          <div class="card-body">
            <h4 class="card-title"><?= $patients['lastname'] ?></h4>
            <p class="card-text"><?= $patients['firstname'] ?></p>
            <p class="card-text"><small class="text-muted"><?= $patients['birthdate2'] ?></small></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-body">
          <form action="detail-patient.php" method="post">
            <button type="submit" class="btn bi bi-pencil ms-2" name="detail" value="<?php echo $patients['id'];?>">    Détails</button>
      </form>
      <form action="" method="post">
            <button type="submit" class="btn bi bi-trash ms-2" name="idToDelete" value="<?php echo $patients['id'];?>">    Supprimer</button>
      </form>
          </div>
        </div>
      </div>      

    </div>
    <?php } ?>
  </div>

  <div class="d-flex justify-content-center">
    <a href="ajout-patient.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Ajouter un
      nouveau patient</a>
  </div>

  <div class="d-flex justify-content-center">
    <a href="index.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Accueil</a>
  </div>

  <nav>
    <ul class="pagination">
      <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
      <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
        <a href="liste-patient.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
      </li>
      <?php for($page = 1; $page <= $pages; $page++): ?>
      <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
      <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
        <a href="liste-patient.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
      </li>
      <?php endfor ?>
      <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
      <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
        <a href="liste-patient.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
      </li>
    </ul>
  </nav>


</body>
</html>