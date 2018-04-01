<!DOCTYPE html>
<?php require("Back-End/islogedin.php"); ?>
<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Startseite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JQuery -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/moment.js"></script>
    <!-- Particle/ Animation -->
    <link rel="stylesheet" href="./css/animate.css">
    <!-- Bulma CSS-->
    <link rel="stylesheet" href="./css/bulma.css">
    <link rel="stylesheet" href="./css/bulma-radio-checkbox.css">
    <!-- Icons-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- for the Date -->
    <link rel="stylesheet" href="calendar-pignose/css/pignose.calendar.min.css"/>
    <script src="calendar-pignose/js/pignose.calendar.min.js"></script>
    <!-- for the Time -->
    <link rel="stylesheet" href="clockpicker/jquery-clockpicker.min.css">
    <script src="clockpicker/jquery-clockpicker.min.js"></script>
    <!-- Notifications -->
    <script src="growl/jquery.growl.js" type="text/javascript"></script>
    <link href="growl/jquery.growl.css" rel="stylesheet" type="text/css"/>
    <!-- fullCalendar-->
    <script src="fullCalendar/fullcalendar.js" type="text/javascript"></script>
    <script src="fullCalendar/locale-all.js" type="text/javascript"></script>
    <script src="js/calendar.js"></script>
    <link href="fullCalendar/fullcalendar.css" rel="stylesheet" type="text/css">
    <!-- MyScript -->
    <script src="js/Script.js"></script>
    <!-- MyStyle Options -->
    <link rel="stylesheet" href="./css/myCss.css"/>
</head>
<body>
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
    die();
}
include("navbar.php");
?>
<div class="container" style="background-color: rgba(77,77,77, 0.1);">

    <div class="columns" style="width: 95%; margin: 0 auto">
        <div class="column">
            <span>Spieler hinzufügen</span>
        </div>
        <div class="column">
            <div class="field">
                <div class="control">
                    <div class="file has-name">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">Datei auswählen</span>
                        </span>
                            <span class="file-name">
                          Hier würde der Dateiname stehen
                        </span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Vorname Nachnahme">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="input" type="email" placeholder="Email">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <a class="button is-success">hinzufügen</a>
                </div>
            </div>
        </div>
    </div>
    <div class="is-divider" style="width: 90%; margin: 0 auto;"></div>
    <div class="section">
        <div class="columns">
            <div class="column">
                <span>Spieler hinzufügen</span>
            </div>
            <div class="column">
                <span>File upload: </span>
            </div>
        </div>
    </div>
</div>

</body>
</html>
