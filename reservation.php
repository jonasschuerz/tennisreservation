<?php include("isLogedIn.php") ?>
<!DOCTYPE html>
<html style="height: 100%; background-color: #606060;">
<head>
    <meta charset="utf-8">
    <title>Startseite</title>
    <script src="Script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bulma CSS-->
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/moment.js"></script>
    <!-- for the Date -->
    <link rel="stylesheet" href="calendar/css/pignose.calendar.min.css"/>
    <script src="calendar/js/pignose.calendar.min.js"></script>
    <!-- for the Time -->
    <link rel="stylesheet" href="clockpicker/jquery-clockpicker.min.css">
    <script src="clockpicker/jquery-clockpicker.min.js"></script>
</head>
<body>
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
    die();
}
include("navbar.php");
?>
<div class="container" style="background-color: #4d4d4d">
    <div class="tabs is-centered" style="background-color: #404040; ">
        <!--Tab (meine Reservierungen, neue Reservierung)-->
        <ul>
            <li class="is-active"><a style="color: white;">meine Reservierungen</a></li>
            <li><a href="newreservation.php" style="color: white;">neue Reservierung</a></li>
        </ul>
    </div>
    <div class="" style="padding: 0.05em 2% 2% 2%;"> <!-- Content -->
        <div class="columns is-variable" style="margin: 0 0 20px 0; background-color: grey; ">
            <!-- Place and Date Selection-->
            <div class="column is-2"> <!--Date-->
                <input type="text" id="text-calendar" class="input calendar"/>
                <script>$(function () {
                        $('input.calendar').pignoseCalendar({
                            lang: 'de',
                            week: 1,
                            format: 'DD-MM-YYYY' // date format string. (02-02-2018)
                        });
                    });</script>
            </div>
            <div class="column is-2 input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                <input type="text" class="input form-control" placeholder="Von-Uhrzeit">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
            <script type="text/javascript">
                $('.clockpicker').clockpicker({
                });
            </script>
            <div class="column is-2"> <!--Time-->
                <input placeholder="Von-Uhrzeit" class="input is-hovered" type="text" onfocus="(this.type='time')"
                       onblur="(this.type='text')">
            </div>
            <div class="column is-2"> <!--Time-->
                <input placeholder="Bis-Uhrzeit" class="input is-hovered" type="text" onfocus="(this.type='time')"
                       onblur="(this.type='text')">
            </div>
            <div class="column is-1"> <!--Places-->
                <div class="dropdown is-hoverable">
                    <div class="dropdown-trigger">
                        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
                            <span>Platz</span>
                            <span class="icon is-small">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                        <div class="dropdown-content">
                            <p class="dropdown-item"> Platz 1 </p>
                            <p class="dropdown-item"> Platz 2 </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="column is-2">
                <button class="button is-primary">Platz reservieren</button>
            </div>
        </div>
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
                        <label class="checkbox">
                            <input type="checkbox">
                        </label>
                    </td>
                    <td> von</td>
                    <td> bis</td>
                    <td> PlatzNR</td>
                    <td> Status</td>
                </tr>
                <tr>
                    <td>
                        <label class="checkbox">
                            <input type="checkbox">
                        </label>
                    </td>
                    <td> Von</td>
                    <td> Bis</td>
                    <td> 2PlatzNR</td>
                    <td> 2Status</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="" style="background: grey; padding: 0.75em;"> <!--Buttons-->
            <a class="button is-danger " style=""> Auswahl Löschen</a>
        </div>
    </div>
</div>
</body>
</html>
