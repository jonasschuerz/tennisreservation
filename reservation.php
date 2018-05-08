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

    <!-- Air Datepicker -->
    <link href="air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="air-datepicker/js/datepicker.min.js"></script>
    <script src="air-datepicker/js/i18n/datepicker.de.js"></script>
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
<body onload="addOptionsPlace()">
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
    die();
}
include("navbar.php");
?>
<div class="container" style="background-color: rgba(128,128,128, 0.9);">
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
                    <select class="place" id="place"> </select>
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
        <div id="calendarReservation"></div>
        <div class="" style="padding:  0.75em 0.75em 0.75em 0.75em"> <!--Button-->
            <button id="saveChange" onclick="updateData()" class="button is-white " style=""><i class="far fa-save"></i>
                &nbsp
                Änderungen speichern
            </button>
        </div>
    </div>
    <div class="modal" id="popup" style="width: 100%;">
        <div class="modal-background"></div>
        <div class="modal-card">
            <section class="modal-card-body">
                <div class="columns" style="height:100%;">
                    <div class="column" style="display: flex; align-items: center;">
                        <div id="datePopup" class="datepicker-here"  inline="true" data-language='de'></div>
                    </div>
                    <div class="column">
                        <table class="table" style="width: 100%; margin-bottom: 10px">
                            <thead><tr><th>Start</th></tr></thead>
                            <tbody><tr><td><div id="startPopup" class="only-time"/></td></tr></tbody>
                            <thead><tr><th>Ende</th></tr></thead>
                            <tbody><tr><td><div id="endPopup" class="only-time"/></td></tr></tbody>
                            <thead><tr><th>Platz</th></tr></thead>
                            <tbody><tr>
                                <td> <div class="select" id="placePopup" style="width: 100%">
                                        <select class="place" style="width: 100%">
                                        </select>
                                    </div>
                                </td><td></td></tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button id="savePopup" class="button is-success">Save changes</button>
                <button id="cancelPopup" class="button">Cancel</button>
                <button id="deletePopup" class="button is-danger">Löschen</button>
            </footer>
        </div>
    </div>
</div>
</body>
<script lang="javascript">
    $('.only-time').datepicker({
        dateFormat: ' ',
        timepicker: true,
        classes: 'only-timepicker'
    });
</script>
</html>
