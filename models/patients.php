<?php

require './models/database.php';

class Patients extends Database {

    public function addPatients()
    {

        // $error = 0;
        // $regexName = "/^[A-z]{4,20}$/";

        // if (isset($_POST['yourName'])) {
        //     if (!preg_match($regexName, $_POST['yourName'])) {
        //       $wrongName = "Format incorrect ex : John";
        //       $error = 1;
        //     }
        //   }
            $name = $_POST["yourName"];
            $firstname = $_POST["yourFirstName"];
            $mail = $_POST["yourEmail"];
            $birth = $_POST["yourBirth"];
            $phone = $_POST["yourPhone"];
            $database = $this->connectDatabase();
            $myQuery = 'INSERT INTO patients(lastname,firstname,birthdate,phone,mail) 
        VALUES( :lastname,:firstname,:birth,:phone,:email)';
            $queryPatient = $database->prepare($myQuery);
            $queryPatient->bindValue(':lastname', $name, PDO::PARAM_STR);
            $queryPatient->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $queryPatient->bindValue(':birth', $birth, PDO::PARAM_STR);
            $queryPatient->bindValue(':phone', $phone, PDO::PARAM_STR);
            $queryPatient->bindValue(':email', $mail, PDO::PARAM_STR);
            $execute = $queryPatient->execute();
            return $execute;
    }

    public function displayPatients() {
        $database = $this->connectDatabase();
        $myQuery = "SELECT *, DATE_FORMAT(`birthdate`, '%d/%m/%Y') as birthdate2 FROM `patients`";
        $queryPatient = $database->query($myQuery);
        $fetch = $queryPatient->fetchAll();
        return $fetch;
    }

    public function displayPatientsPages($premier,$parPage) {
        $database = $this->connectDatabase();
        $myQuery = "SELECT *, DATE_FORMAT(`birthdate`, '%d/%m/%Y') as birthdate2 FROM `patients` ORDER BY id DESC LIMIT :premier, :parpage;";
        $queryPatient = $database->prepare($myQuery);
        $queryPatient->bindValue(':premier', $premier, PDO::PARAM_INT);
        $queryPatient->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $queryPatient->execute();
        $fetch = $queryPatient->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }

    public function detailPatients($id) {
        $database = $this->connectDatabase();
        $myQuery = "SELECT *, DATE_FORMAT(`birthdate`, '%d/%m/%Y') as birthdate2 FROM `patients` where ID = :id";
        $queryPatient = $database->prepare($myQuery);
        //permet d'indiquer que $id sera bien :id dans la requête du dessus et que le format sera du int, à faire quand on a qu'une ligne dans un array
        $queryPatient->bindValue(':id', $id, PDO::PARAM_INT);
        $queryPatient->execute();
        $fetch = $queryPatient->fetch();
        return $fetch;
    }


    public function modifyPatients() {
        $database = $this->connectDatabase();
        $lastname = $_POST["lastname"];
        $firstname = $_POST["firstname"];
        $mail = $_POST["mail"];
        $phone = $_POST["phone"];
        $birthdate = $_POST["birthdate"];
        $id = $_POST['detail'];
        //on récupère les données remplies sur la publication pour les insérer dans la table article et modifier l'article concerné
        $req = $database->prepare('UPDATE `patients` SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone,
mail = :mail where id = :id');
        $req->execute(array(
            'lastname' => $lastname,
            'firstname' => $firstname,
            'mail' => $mail,
            'phone' => $phone,
            'birthdate' => $birthdate,
            'id' => $id
        ));

    }


    public function detailAppPatients($id) {
        $database = $this->connectDatabase();
        $myQuery = "SELECT concat(left(dateHour,10),'T',right(dateHour,8)) as dateHour FROM `appointments` where idPatients = :id order by dateHour";
        $queryPatient = $database->prepare($myQuery);
        $queryPatient->bindValue(':id', $id, PDO::PARAM_INT);
        $queryPatient->execute();
        $fetch = $queryPatient->fetchAll();
        return $fetch;
    }

    public function deletePatients($id) {
        $database = $this->connectDatabase();
        $myQuery = "DELETE FROM `appointments` where idPatients = :id; DELETE FROM `patients` where id = :id";
        $queryPatient = $database->prepare($myQuery);
        $queryPatient->bindValue(':id', $id, PDO::PARAM_INT);
        $execute = $queryPatient->execute();
        return $execute;
    }

    public function searchPatients($search) {
        $database = $this->connectDatabase();
        $myQuery = "SELECT *, DATE_FORMAT(`birthdate`, '%d/%m/%Y') as birthdate2 FROM `patients` where lastname like :search";
        $queryPatient = $database->prepare($myQuery);
        $queryPatient->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $queryPatient->execute();
        $fetch = $queryPatient->fetchAll();
        return $fetch;
    }


    public function numberPatients() {
        $database = $this->connectDatabase();
        $myQuery = "SELECT count(*) AS nb_patients FROM `patients`";
        $queryPatient = $database->query($myQuery);
        $numberPatients = $queryPatient->fetch();
        return $numberPatients;
    }

    public function addPatientsApp(){
            $name = $_POST["yourName"];
            $firstname = $_POST["yourFirstName"];
            $mail = $_POST["yourEmail"];
            $birth = $_POST["yourBirth"];
            $phone = $_POST["yourPhone"];
            $yourAppointment = $_POST["yourAppointment"];
            $database = $this->connectDatabase();
            $myQuery = 'INSERT INTO patients(lastname,firstname,birthdate,phone,mail) VALUES(:lastname,:firstname,:birth,:phone,:email);
                        INSERT INTO appointments(dateHour,idPatients) select :dateHour as dateHour, id from `patients` where lastname = :lastname and firstname = :firstname';
            $queryPatient = $database->prepare($myQuery);
            $queryPatient->bindValue(':lastname', $name, PDO::PARAM_STR);
            $queryPatient->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $queryPatient->bindValue(':birth', $birth, PDO::PARAM_STR);
            $queryPatient->bindValue(':phone', $phone, PDO::PARAM_STR);
            $queryPatient->bindValue(':email', $mail, PDO::PARAM_STR);
            $queryPatient->bindValue(':dateHour', $yourAppointment, PDO::PARAM_STR);
            $execute = $queryPatient->execute();
            return $execute;
    }




}
