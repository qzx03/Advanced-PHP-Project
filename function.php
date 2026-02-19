<?php

function ADDinfo($ALLinfo) {
    $file = "data/consultations.json";

    if (!file_exists($file)) {
        file_put_contents($file, json_encode([], JSON_PRETTY_PRINT));
    }

    $json = file_get_contents($file);
    $data = json_decode($json, true) ?: [];

    $data[] = $ALLinfo;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

function validateConsultation($PLname, $PFname, $Bdate, $tel, $Cdate, $Creason, $temp, $systolic, $diastolic, $weight, $height) {
    $errors = [];

    if (empty(trim($PLname))) $errors[] = "Last name is required.";
    if (empty(trim($PFname))) $errors[] = "First name is required.";
    if (empty($Bdate)) $errors[] = "Birth date is required.";
    if (empty(trim($tel))) $errors[] = "Phone number is required.";
    if (empty($Cdate)) $errors[] = "Consultation date is required.";
    if (empty(trim($Creason))) $errors[] = "Consultation reason is required.";

    if (!is_numeric($temp) || $temp < 35 || $temp > 42) $errors[] = "Temperature must be between 35°C and 42°C.";
    if (!is_numeric($weight) || $weight < 2 || $weight > 250) $errors[] = "Weight must be between 2 kg and 250 kg.";
    if (!is_numeric($height) || $height < 50 || $height > 250) $errors[] = "Height must be between 50 cm and 250 cm.";
    if (!is_numeric($systolic) || $systolic < 80 || $systolic > 200) $errors[] = "Systolic pressure must be between 80 and 200.";
    if (!is_numeric($diastolic) || $diastolic < 40 || $diastolic > 130) $errors[] = "Diastolic pressure must be between 40 and 130.";

    if ($Cdate > date("Y-m-d")) $errors[] = "Consultation date must be today or earlier.";

    return $errors;
}

function calculAge($date_naissance) {
    $today = new DateTime();
    $birth = new DateTime($date_naissance);
    return $today->diff($birth)->y;
}

function calculIMC($weight, $height) {
    if ($height <= 0) return 0;
    return round($weight / ($height * $height), 2);
}

function diagnosticIMC($imc) {
    if ($imc < 18.5) return "Sous-poids";
    if ($imc < 25) return "Poids normal";
    if ($imc < 30) return "Surpoids";
    return "Obésité";
}

function detectFievre($temperature) {
    return $temperature >= 38.5;
}

function detectHypertension($systolic, $diastolic) {
    return ($systolic >= 140 || $diastolic >= 90);
}
