<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Hospital</title>
</head>
<body>

<div class="container-fluid text-center h-100 align-items-center centerPage">

<div class="row justify-content-center h-100 align-items-center">
      <div class="col-sm-3 border shadowblock bg-light">
        <h1 class="mt-2 figcaption text-danger">Hospital</h1>
        <form action="./" method="POST">
        <a href="ajout-patient.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Ajouter un patient</a>
        <a href="liste-patient.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Consulter la liste des patients</a>
        <a href="ajout-rendezvous.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Créer un rendez-vous</a>
        <a href="liste-rendezvous.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Consulter la liste des rendez-vous</a>
        <a href="ajout-patient-rendez-vous.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Ajouter un patient et un rendez-vous</a>
        </form>
      </div>
    </div>
    </div>


</body>
</html>