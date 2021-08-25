<?php

require 'controllers/controller.php';

?>

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


<div class="container-fluid centerPage text-center">

    <div class="col justify-content-center">
        <div class="col-sm-6 bg-light border shadowblock">
            <h1 class="text-center">Ajout d'un patient et d'un rendez-vous</h1>

            <form action="" method="post">

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-3 d-flex justify-content-start"> Nom :</label>
                        <input type="text" class="form-control box" name="yourName" id="yourName">
                        <span id="messageInfosName"></span>
                        <div class="error"><?= $wrongName ?? '' ?></div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Prénom :</label>
                        <input type="text" class="form-control box" id="yourFirstName" name="yourFirstName">
                        <span id="messageInfosFirstName"></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Adresse email :</label>
                        <input type="text" class="form-control box" id="yourEmail" name="yourEmail">
                        <span id="messageInfosEmail"></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Date de naissance :</label>
                        <input type="date" class="form-control box" id="yourBirth" name="yourBirth">
                        <span id="messageInfosCity"></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Téléphone :</label>
                        <input type="text" class="form-control box" id="yourPhone" name="yourPhone">
                        <span id="messageInfosPostalCode"></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Date du rendez-vous :</label>
                        <input type="datetime-local" class="form-control box" id="yourAppointment" name="yourAppointment">
                        <span id="messageInfosCity"></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-3d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mt-5 mb-3" id='myButton' name="validPatientApp">Valider</button>
                        <span id="messageInfosProb"></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-3d-flex justify-content-center">
                    <a href="index.php" class="btn btn-primary btn active mt-3 p-2" role="button" aria-pressed="true">Accueil</a>
                    </div>
                </div>             

            </form>

            <!-- Modal -->
<div class="modal fade" id="myModalPatients" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout du nouveau patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Le nouveau patient et son rendez-vous ont bien été enregistrés !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>  

        </div>
    </div>
</div>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>
    
<script>
var myModalPatients = new bootstrap.Modal(document.getElementById('myModalPatients'), {
    keyboard: false
  })

  <?= $confirmModalPatients ?>
</script>


   
</body>
</html>