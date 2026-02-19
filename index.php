<?php
$file = "data/consultations.json";
$json = @file_get_contents($file);
$data = json_decode($json, true) ?: [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient Dashboard</title>
<style>
body { font-family: Arial, sans-serif; background-color: #121212; color: #eee; margin:0; padding:0; }
form { max-width:600px; margin:20px auto; text-align:center; }
input[type="submit"] { background-color:#1976d2; color:white; padding:10px 20px; border:none; border-radius:8px; cursor:pointer; }
input[type="submit"]:hover { background-color:#1565c0; }
.card-container { display:flex; flex-wrap:wrap; justify-content:center; gap:20px; padding:20px; }
.patient-card { width:280px; padding:15px; border-radius:12px; background:#1e1e1e; color:white; box-shadow:0 0 10px rgba(0,0,0,0.5); position:relative; }
.patient-card h3 { margin-top:0; }
.patient-card hr { border:0; border-top:1px solid #444; margin:10px 0; }
.alert { padding:5px 10px; border-radius:5px; margin-top:5px; font-size:0.9rem; }
.alert-fever { background-color:#b71c1c; color:white; }
.alert-hypertension { background-color:#ff6f00; color:white; }
.alert-underweight { background-color:#1976d2; color:white; }
.alert-obese { background-color:#d32f2f; color:white; }
</style>
</head>
<body>

<form action="add.php">
    <input type="submit" value="Add New Patient">
</form>

<div class="card-container">
<?php foreach($data as $entry): 
    $patient = $entry[0];
    $consult = $entry[1];
?>
<div class="patient-card">
    <h3>Patient Card</h3>

    <h4>Personal Info</h4>
    <p><strong>Name:</strong> <?= htmlspecialchars($patient[1]." ".$patient[0]) ?></p>
    <p><strong>Birth:</strong> <?= htmlspecialchars($patient[2]) ?></p>
    <p><strong>Gender:</strong> <?= htmlspecialchars($patient[3]) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($patient[4]) ?></p>
    <p><strong>Age:</strong> <?= htmlspecialchars($patient[5]) ?></p>

    <hr>

    <h4>Consultation</h4>
    <p><strong>Date:</strong> <?= htmlspecialchars($consult[0]) ?></p>
    <p><strong>Reason:</strong> <?= htmlspecialchars($consult[1]) ?></p>
    <p><strong>Temp:</strong> <?= htmlspecialchars($consult[2]) ?> °C</p>
    <p><strong>BP:</strong> <?= htmlspecialchars($consult[3]) ?>/<?= htmlspecialchars($consult[4]) ?></p>
    <p><strong>Weight:</strong> <?= htmlspecialchars($consult[5]) ?> kg</p>
    <p><strong>Height:</strong> <?= htmlspecialchars($consult[6]) ?> cm</p>
    <p><strong>BMI:</strong> <?= htmlspecialchars($consult[7]) ?> kg/m²</p>
    <p><strong>Symptoms:</strong> <?= htmlspecialchars(implode(", ", $consult[8])) ?></p>

    <?php if($consult[2] >= 38.5): ?>
        <div class="alert alert-fever">Fever detected (≥ 38°C)</div>
    <?php endif; ?>
    <?php if($consult[3] >= 140 || $consult[4] >= 90): ?>
        <div class="alert alert-hypertension">Hypertension detected (≥ 140/90)</div>
    <?php endif; ?>
    <?php if($consult[7] < 18.5): ?>
        <div class="alert alert-underweight">Underweight (BMI &lt; 18.5)</div>
    <?php elseif($consult[7] >= 30): ?>
        <div class="alert alert-obese">Obese (BMI ≥ 30)</div>
    <?php endif; ?>
</div>
<?php endforeach; ?>
</div>

</body>
</html>