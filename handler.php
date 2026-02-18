<?php
require "function.php";
$PLname = $_POST['PLname'];
$PFname = $_POST['PFname'];
$Bdate = $_POST['Bdate'];
$Gender = $_POST['Gender'];
$tel = $_POST['PHnum'];
$Cdate = $_POST['Cdate'];
$Creason = $_POST['Creason'];
$temp = floatval($_POST['temp']);
$pressure = $_POST['pressure'] ?? [];
$systolic = intval($pressure[0] ?? 0);
$diastolic = intval($pressure[1] ?? 0);
$weight = floatval($_POST['weight']);
$height = floatval($_POST['height']);
$Symptoms = $_POST['symptoms'] ?? [];

$Pinfo = [  $PLname,
            $PFname,
            $Bdate,
            $Gender,
            $tel
];
$Cinfo = [  $Cdate,
            $Creason,
            $temp,
            $systolic,
            $diastolic,
            $weight,
            $height,
            $Symptoms
];

$ALLinfo =  [
    $Pinfo,
    $Cinfo
];

ADDinfo($ALLinfo);



?>
