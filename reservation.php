<!DOCTYPE html>

<?php require("islogedin.php"); ?>
<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Startseite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JQuery -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/moment.js"></script>
    <!-- Particle/ Animation -->
    <link rel="stylesheet" href="animate.css">
    <script src="particles/particles.js"></script>
    <!-- Bulma CSS-->
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bulma/css/bulma-radio-checkbox.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- for the Date -->
    <link rel="stylesheet" href="calendar/css/pignose.calendar.min.css"/>
    <script src="calendar/js/pignose.calendar.min.js"></script>
    <!-- for the Time -->
    <link rel="stylesheet" href="clockpicker/jquery-clockpicker.min.css">
    <script src="clockpicker/jquery-clockpicker.min.js"></script>

    <script src="js/Script.js"></script>
</head>
<body>
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
    die();
}
include("navbar.php");
?>
<div id="particles-js" style="position: absolute; width: 100%; height: 100%;"></div>
<div class="container" style="background-color: #4d4d4d">
    <div class="tabs is-centered" style="background-color: #404040; ">
        <ul>
            <li class="is-active"><a style="color: white;">Neue Reservierungen</a></li>
        </ul>
    </div>
    <div class="animated zoomIn" style="padding: 0.05em 2% 0.2% 2%;"> <!-- Content -->
        <div class="columns" style="margin: 0 0 20px 0; background-color: grey; ">
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
                <input id="fromTime" type="text" class="input form-control" placeholder="Von-Uhrzeit">
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
                <input id="toTime" type="text" class="input form-control" placeholder="Bis-Uhrzeit">
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
                        <select name="place">
                            <option class="dropdown-item"> Platz 1 </option>
                            <option class="dropdown-item"> Platz 2 </option>
                        </select>
                    </div>

            </div>
            <div class="column is-5 ">
                <button id="addReservation" class="button is-primary"><i class="fas fa-plus"></i>&nbsp Platz reservieren</button>
            </div>
        </div>
    </div>
    <div style="background-color: white; height: 2px;"></div>
    <div class="tabs is-centered" style="background-color: #404040; ">
        <ul>
            <li class="is-active"><a style="color: white;">meine Reservierungen</a></li>
        </ul>
    </div>
    <div class="animated zoomIn" style="padding: 0.05em 2% 2% 2%;">
        <div class="" style="background-color: grey; "> <!--Reservierungen-->
            <table class="table" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th> Von</th>
                    <th> Bis</th>
                    <th> Platz</th>
                    <th> Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th> Elemente</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                <tr>
                    <td>
                        <div class="field">
                            <p class="control">
                            <div class="b-checkbox is-dark">
                                <input id="checkbox" class="styled" type="checkbox">
                                <label for="checkbox">
                                </label>
                            </div>
                            </p>
                        </div>
                    </td>
                    <td> von</td>
                    <td> bis</td>
                    <td> PlatzNR</td>
                    <td> Status</td>
                </tr>
                <tr>
                    <td>
                        <div class="field">
                            <p class="control">
                            <div class="b-checkbox is-dark">
                                <input id="checkbox01" class="styled" type="checkbox">
                                <label for="checkbox01">
                                </label>
                            </div>
                            </p>
                        </div>
                    </td>
                    <td> Von</td>
                    <td> Bis</td>
                    <td> 2PlatzNR</td>
                    <td> 2Status</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="" style="background: grey; padding:  0.75em 0.75em 0.75em 0.75em"> <!--Button-->
            <button id="deleteRegistration" class="button is-danger " style=""><i class="fas fa-trash-alt"></i> &nbsp Auswahl Löschen</button>
        </div>
    </div>
</div>

</body>
<script>particlesJS.load('particles-js', 'particles/particlesjs-config.json', function () {
        console.log('callback - particles.js config loaded');
    });
</script>

</html>
