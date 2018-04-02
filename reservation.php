<!DOCTYPE html>
<?php require("Back-End/islogedin.php"); ?>
<html style="max-height: 100%;">
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
<body onload="addOptionsPlace()" >
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
    die();
}
include("navbar.php");
?>
<div class="container" style="background-color: rgba(77,77,77, 0.1);">
    <div class="tabs is-centered" style="background-color: #404040; ">
        <ul>
            <li class="is-active"><a style="color: white;">Neue Reservierungen</a></li>
        </ul>
    </div>
    <!-- Neue Reservierung -->
    <div class="animated zoomIn" style="padding: 0.05em 2% 0.2% 2%;">
        <div class="columns" style="margin: 0 0 20px 0; ">
            <!-- Place and Date Selection-->
            <div class="column is-2"> <!--Date-->
                <input type="text" id="date" class="input calendar" placeholder="Datum"/>
                <script>$(function () {
                        $('input.calendar').pignoseCalendar({
                            lang: 'de',
                            week: 1,
                            format: 'DD-MM-YYYY' // date format string. (02-02-2018)
                        });
                    });</script>
            </div>
            <div class="column is-2 input-group clockpicker" data-placement="left" data-align="top"
                 data-autoclose="true">
                <input id="startTime" type="text" class="input form-control" placeholder="Von-Uhrzeit">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
            <script type="text/javascript">
                $('.clockpicker').clockpicker({
                    placement: 'bottom'
                });
            </script>
            <div class="column is-2 input-group clockpicker" data-placement="left" data-align="top"
                 data-autoclose="true">
                <input id="endTime" type="text" class="input form-control" placeholder="Bis-Uhrzeit">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
            <script type="text/javascript">
                $('.clockpicker').clockpicker({
                    placement: 'bottom'
                });
            </script>

            <div class="column"> <!--Places-->

                <div class="select">
                    <select id="place" name="place"> </select>
                </div>

            </div>
            <div class="column is-5 ">
                <button id="addReservation" class="button is-success"><i class="fas fa-plus"></i>&nbsp Platz reservieren
                </button>
            </div>
        </div>
    </div>
    <div style="background-color: white; height: 2px;"></div>
    <!-- Calender mit Reservierungen -->
    <div class="tabs is-centered" style="background-color: #404040; ">
        <ul>
            <li class="is-active"><a style="color: white;">meine Reservierungen</a></li>
        </ul>
    </div>
    <div class="animated zoomIn" style="padding: 0.05em 2% 2% 2%; height: 100%">
        <div id="calendarReservation" ></div>
        <div class="" style="padding:  0.75em 0.75em 0.75em 0.75em"> <!--Button-->
            <button id="saveChange" onclick="updateData()" class="button is-white " style=""><i class="far fa-save"></i> &nbsp
                Änderungen speichern
            </button>
        </div>
    </div>
</div>

</body>
</html>
