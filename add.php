<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="handler.php" method="POST">
        <fieldset><legend>Patient Info</legend>
            <label for="PLname">Last Name:</label><br>
            <input type="text" name="PLname" id="PLname"><br><br>
            <label for="PFname">First Name:</label><br>
            <input type="text" name="PFname" id="PFname"><br><br>
            <label for="Bdate">Birth Date:</label><br>
            <input type="date" name="Bdate" id="Bdate"><br><br>
            <label for="Gender">Gender:</label><br>
            <select name="Gender" id="Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>
            <label for="PHnum">Phone Number:</label><br>
            <input type="tel" name="PHnum" id="PHnum"><br><br>
        </fieldset>
        <fieldset><legend>Consultation Info</legend>
            <label for="Cdate">Consultation Date:</label>
            <input type="date" name="Cdate" id="Cdate"><br><br>
            <label for="Creason">Consultation reason:</label><br>
            <input type="text" name="Creason" id="Creason"><br><br>
            <label for="temp">Body temperature (°C):</label><br>
            <input type="number" name="temp" id="temp" step="0.1"><br><br>
            <label for="pressure">Blood pressure:</label><br>
            <input type="number" name="pressure[]" placeholder="systolic"> / 
            <input type="number" name="pressure[]" placeholder="diastolic"><br><br>
            <label for="weight">Weight:</label><br>
            <input type="number" name="weight" id="weight" step="0.1"><br><br>
            <label for="height">Height:</label><br>
            <input type="number" name="height" id="height" step="0.1"><br><br>
            <label>Symptoms:</label><br>
            <input type="checkbox" id="cough" name="symptoms[]" value="Cough">
            <label for="cough">Cough</label><br>

            <input type="checkbox" id="fever" name="symptoms[]" value="Fever">
            <label for="fever">Fever</label><br>

            <input type="checkbox" id="headache" name="symptoms[]" value="Headache">
            <label for="headache">Headache</label><br>


        </fieldset>
        <input type="submit">
    </form>
</body>
</html>