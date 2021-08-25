<?php

// require './models/database.php';

class Appointments extends Database {

    public function addAppointments(){
            $id = $_POST["selectPatients"];
            $yourAppointment = $_POST["yourAppointment"];
            $database = $this->connectDatabase();
            $myQuery = "INSERT INTO appointments(dateHour,idPatients) 
            VALUES( :dateHour,:id)";
            $queryPatient = $database->prepare($myQuery);
            $queryPatient->bindValue(':id', $id, PDO::PARAM_STR);
            $queryPatient->bindValue(':dateHour', $yourAppointment, PDO::PARAM_STR);
            $execute = $queryPatient->execute();
            return $execute;
    }

    public function displayAppointments(){
        $database = $this->connectDatabase();
        $myQuery = "SELECT A.*,
                           B.dateHour,
                           B.id as idApp
 FROM patients as A INNER JOIN appointments as B on A.id = B.idpatients";
        $queryAppointments = $database->query($myQuery);
        $fetch = $queryAppointments->fetchAll();
        return $fetch;
    }

    public function detailAppointments($id){
        $database = $this->connectDatabase();
        $myQuery = "SELECT A.*,
                           concat(left(B.dateHour,10),'T',right(B.dateHour,8)) as dateHour,
                           B.id as idApp
 FROM `patients` AS A INNER JOIN `appointments` AS B ON A.id = B.idpatients WHERE B.id = $id";
        $queryAppointments = $database->prepare($myQuery);
        $queryAppointments->bindValue(':id', $id, PDO::PARAM_INT);
        $queryAppointments->execute();
        $fetch = $queryAppointments->fetch();
        return $fetch;
    }


    public function modifyAppointments() {
        $database = $this->connectDatabase();
        $appDate = $_POST["appDate"];
        $id = $_POST['detailApp'];
        $myQuery = "UPDATE `appointments` SET dateHour = :appDate where id = :id";
        $queryAppointments = $database->prepare($myQuery);
        $queryAppointments->bindValue(':id', $id, PDO::PARAM_INT);
        $queryAppointments->bindValue(':appDate', $appDate, PDO::PARAM_STR);
        $queryAppointments->execute();
    }

    public function deleteAppointments($id) {
        $database = $this->connectDatabase();
        $myQuery = "DELETE FROM `appointments` where id = :id";
        $queryAppointments = $database->prepare($myQuery);
        $queryAppointments->bindValue(':id', $id, PDO::PARAM_INT);
        $execute = $queryAppointments->execute();
        return $execute;
    }


}
