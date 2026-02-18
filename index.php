<?php
$file = "data/consultations.json";

$json = file_get_contents($file);
$data = json_decode($json, true);
?>

<div style="
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
">
<?php foreach ($data as $entry): 
    $patient = $entry[0];
    $consult = $entry[1];
?>
    <div style="
        width: 250px;
        padding: 15px;
        border-radius: 12px;
        background: #1e1e1e;
        color: white;
        font-family: Arial;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
    ">
        <h3 style="margin-top:0;">Patient Card</h3>

        <h4>Personal Info</h4>
        <p><strong>Name:</strong> <?= $patient[1] . " " . $patient[0] ?></p>
        <p><strong>Birth:</strong> <?= $patient[2] ?></p>
        <p><strong>Gender:</strong> <?= $patient[3] ?></p>
        <p><strong>Phone:</strong> <?= $patient[4] ?></p>

        <hr>

        <h4>Consultation</h4>
        <p><strong>Date:</strong> <?= $consult[0] ?></p>
        <p><strong>Reason:</strong> <?= $consult[1] ?></p>
        <p><strong>Temp:</strong> <?= $consult[2] ?> °C</p>
        <p><strong>BP:</strong> <?= $consult[3] ?>/<?= $consult[4] ?></p>
        <p><strong>Weight:</strong> <?= $consult[5] ?> kg</p>
        <p><strong>Height:</strong> <?= $consult[6] ?> cm</p>
        <p><strong>Symptoms:</strong> <?= implode(", ", $consult[7]) ?></p>
    </div>
<?php endforeach; ?>
</div>
