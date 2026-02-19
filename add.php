<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Patient</title>
<style>
body { font-family: Arial, sans-serif; background-color: #121212; color: #eee; margin:0; padding:0; }
form { max-width:600px; margin:30px auto; padding:20px; background:#1e1e1e; border-radius:12px; box-shadow:0 0 15px rgba(0,0,0,0.5); }
fieldset { border:1px solid #444; border-radius:8px; padding:15px; margin-bottom:20px; }
legend { padding:0 10px; font-weight:bold; }
input[type="text"], input[type="tel"], input[type="number"], input[type="date"], select { width:95%; padding:8px; margin-top:5px; margin-bottom:15px; border-radius:6px; border:1px solid #555; background-color:#2c2c2c; color:#eee; }
input[type="submit"] { background-color:#1976d2; color:white; padding:10px 20px; border:none; border-radius:8px; cursor:pointer; font-size:1rem; }
input[type="submit"]:hover { background-color:#1565c0; }
.error-messages { background-color:#d32f2f; color:white; padding:10px; margin:15px 0; border-radius:5px; }
input[type="checkbox"] { margin-right:5px; }
</style>
</head>
<body>

<form action="handler.php" method="POST">
    <fieldset>
        <legend>Patient Info</legend>
        <label for="PLname">Last Name:</label><br>
        <input type="text" name="PLname" id="PLname"><br>

        <label for="PFname">First Name:</label><br>
        <input type="text" name="PFname" id="PFname"><br>

        <label for="Bdate">Birth Date:</label><br>
        <input type="date" name="Bdate" id="Bdate"><br>

        <label for="Gender">Gender:</label><br>
        <select name="Gender" id="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>

        <label for="PHnum">Phone Number:</label><br>
        <input type="tel" name="PHnum" id="PHnum"><br>
    </fieldset>

    <fieldset>
        <legend>Consultation Info</legend>
        <label for="Cdate">Consultation Date:</label><br>
        <input type="date" name="Cdate" id="Cdate"><br>

        <label for="Creason">Consultation reason:</label><br>
        <input type="text" name="Creason" id="Creason"><br>

        <label for="temp">Body temperature (°C):</label><br>
        <input type="number" name="temp" id="temp" step="0.1"><br>

        <label for="pressure">Blood pressure:</label><br>
        <input type="number" name="pressure[]" placeholder="systolic" style="width: 44%;"> / 
        <input type="number" name="pressure[]" placeholder="diastolic" style="width: 46%;"><br>

        <label for="weight">Weight:</label><br>
        <input type="number" name="weight" id="weight" step="0.1"><br>

        <label for="height">Height (cm):</label><br>
        <input type="number" name="height" id="height" step="0.1"><br>

        <label>Symptoms:</label><br>
        <input type="checkbox" id="cough" name="symptoms[]" value="Cough"><label for="cough">Cough</label><br>
        <input type="checkbox" id="fever" name="symptoms[]" value="Fever"><label for="fever">Fever</label><br>
        <input type="checkbox" id="headache" name="symptoms[]" value="Headache"><label for="headache">Headache</label><br>
    </fieldset>

    <input type="submit" value="Submit">
</form>

<?php
if(!empty($_SESSION['errors'])) {
    echo '<div class="error-messages">';
    foreach($_SESSION['errors'] as $error) {
        echo htmlspecialchars($error) . '<br>';
    }
    echo '</div>';
    unset($_SESSION['errors']);
}
?>

</body>
</html>
