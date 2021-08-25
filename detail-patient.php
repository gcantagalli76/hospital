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
            <h1 class="text-center">Informations relatives au patient</h1>

            <form action="" method="post">

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-3 d-flex justify-content-start"> Nom :</label>
                        <input  <?= $disabled ?> type="text" class="form-control box" id="lastname" name="lastname" maxlength="40" value="<?= $detailsPatientsArray['lastname']?>">
                        
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Prénom :</label>
                        <input <?= $disabled ?> type="text" class="form-control box" id="firstname" name="firstname" maxlength="40" value="<?= $detailsPatientsArray['firstname']?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Adresse email :</label>
                        <input <?= $disabled ?> type="text" class="form-control box" id="mail" name="mail" maxlength="40" value="<?= $detailsPatientsArray['mail']?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Date de naissance :</label>
                        <input <?= $disabled ?> type="date" class="form-control box" id="birthdate" name="birthdate" maxlength="40" value="<?= $detailsPatientsArray['birthdate']?>">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Téléphone :</label>
                        <input <?= $disabled ?> type="text" class="form-control box" id="phone" name="phone" maxlength="40" value="<?= $detailsPatientsArray['phone']?>">
                    </div>
                </div>
<!-- Je met un input invisible qui recupère l'id du poste detail en mettant le même name pour qu'au raffraichissement des page au clic sur les bouton je ne perde pas le post detail -->
               <input type="hidden" name="detail" value="<?= $_POST['detail'] ?>"> 



               <div class="row justify-content-center">
                    <div class="col-sm-5 bg-light">
                        <label class="form-label mt-2 d-flex justify-content-start"> Rendez-vous prévus :</label>
                        <?php foreach($detailsAppPatientsArray as $detailsAppByPatients){ ?>
                        <input disabled type="datetime-local" class="form-control box" id="app" maxlength="40" value="<?= $detailsAppByPatients['dateHour']?>">
                        <?php } ?>
                    </div>
                </div>




                <div class="row justify-content-center">
                    <div class="col-sm-3d-flex justify-content-center">
                        <button type="submit" class="btn btn-<?= $colorButton ?> mt-5 mb-3" id='modifyButton' name="<?= $nameButton ?>"><?= $textButton ?></button>
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
<div class="modal fade" id="myModalUpPatients" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification données patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Les informations on bien été modifiées !
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
var myModalUpPatients = new bootstrap.Modal(document.getElementById('myModalUpPatients'), {
    keyboard: false
  })

  <?= $confirmModalUpPatients ?>


</script>
    
</body>
</html>