<?php

require './models/patients.php';
require './models/appointments.php';

$patientsObj = new Patients();
$AppointmentsObj = new Appointments();


//Patients

if (isset($_POST['myButton'])) {
$addPatientsArray = $patientsObj->addPatients();
$confirmModalPatients = 'myModalPatients.show()';
}else {
    $confirmModalApp = '';
}

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

//on affiche le nombre de patients
$nbPatients = $patientsObj->numberPatients();

// On détermine le nombre de patient par page
$parPage = 3;

// On calcule le nombre de pages total
$pages = ceil($nbPatients['nb_patients'] / $parPage);

// Calcul du 1er patient de la page
$premier = ($currentPage * $parPage) - $parPage;

$displayPatientsPagesArray = $patientsObj->displayPatientsPages($premier,$parPage);

$displayPatientsArray = $patientsObj->displayPatients();

if(isset($_POST['detail'])){
    $detailsPatientsArray = $patientsObj->detailPatients($_POST['detail']);
    $detailsAppPatientsArray = $patientsObj->detailAppPatients($_POST['detail']);
}

if (isset($_POST['modifyButton'])) {
    $disabled = '';
    $textButton = 'Valider la modification';
    $nameButton = 'validModify';
    $colorButton = 'success';
    $detailsPatientsArray = $patientsObj->detailPatients($_POST['detail']);
}else {
    $disabled = 'disabled';
    $textButton = 'Modifier les données';
    $nameButton = 'modifyButton';
    $colorButton = 'primary';
}

if(isset($_POST['validModify'])){
    $patientsObj->modifyPatients();
    $detailsPatientsArray = $patientsObj->detailPatients($_POST['detail']);
    $confirmModalUpPatients = 'myModalUpPatients.show()';
}else {
    $confirmModalUpPatients = '';
}

if(isset($_POST['idToDelete'])){
    $detailsPatientsArray = $patientsObj->deletePatients($_POST['idToDelete']);
    header('Location: liste-patient.php');
}

if(isset($_POST['validsearch'])){
    $displayPatientsPagesArray = $patientsObj->searchPatients($_POST['search']);
}


if (isset($_POST['validPatientApp'])) {
    $patientsObj->addPatientsApp();
    $confirmModalPatients = 'myModalPatients.show()';
    }else {
        $confirmModalApp = '';
    }


//Appointments

if(isset($_POST['validAppointment'])){
$addAppointmentsArray = $AppointmentsObj->addAppointments();
$confirmModalApp = 'myModalApp.show()';
}else {
    $confirmModalApp = '';
}


$displayAppointmentsArray = $AppointmentsObj->displayAppointments();


if(isset($_POST['detailApp'])){
    $detailAppointmentsArray = $AppointmentsObj->detailAppointments($_POST['detailApp']);
}

if (isset($_POST['modifyAppButton'])) {
    $disabledApp = '';
    $textAppButton = 'Valider la modification';
    $nameAppButton = 'validModifyApp';
    $colorAppButton = 'success';
    $detailAppointmentsArray = $AppointmentsObj->detailAppointments($_POST['detailApp']);
}else {
    $disabledApp = 'disabled';
    $textAppButton = 'Modifier les données';
    $nameAppButton = 'modifyAppButton';
    $colorAppButton = 'primary';
}

if(isset($_POST['validModifyApp'])){
    $AppointmentsObj->modifyAppointments();
    $detailAppointmentsArray = $AppointmentsObj->detailAppointments($_POST['detailApp']);
    $confirmModal = 'myModal.show()';
}else {
    $confirmModal = '';
}

if(isset($_POST['idAppToDelete'])){
    $AppointmentsObj->deleteAppointments($_POST['idAppToDelete']);
    header('Location: liste-rendezvous.php');
}


?>

