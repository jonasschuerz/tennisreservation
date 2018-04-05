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
<div class="container is-centered" style="  background-color: rgba(128,128,128, 0.9);">
    <figure class="container image">
        <img style="width: 95%; margin: 0 auto;" src="img/contact.jpg">
    </figure>
    <div class="columns" style="width: 95%; margin: 0 auto">
        <div class="column">
            <div class="is-vertical-center" style="height: 100%">
                <div class="is-size-5" style="margin: 0 auto;">
                <ul class="is-unstyled">
                    <li><i class="fas fa-map-marker"></i><span class="has-text-white has-text-weight-semibold">	&nbspAdresse: </span>
                        <span id="contactAddress">Sonnsteinstraße 12, 4040 Linz</span></li>
                    <li><i class="fas fa-phone"></i><span
                                class="has-text-white has-text-weight-semibold"> Telefon: </span><span
                                id="contactTelephone">07235 / 50667</span></li>
                    <li><i class="fas fa-envelope"></i> <span
                                class="has-text-white has-text-weight-semibold"> Email: </span><span
                                id="contactEmail">tennisverein@club.at</span></li>
                </ul>
                <ul class="is-unstyled has-text-centered" style="padding-top: 2%">
                    <li class="is-inlined">
                        <a class="button is-success" href="http://facebook.com" style="color:inherit;">
                            <i class="fab fa-facebook-square"></i>
                            <span> &nbsp; Facebook</span>
                        </a>
                    </li>
                    <li class="is-inlined">
                        <a class="button is-success" href="http://instagram.com" style="color:inherit">
                            <i class="fab fa-instagram"></i>
                            <span> &nbsp; Instagram</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="column">
        <div class="">
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Name">
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email">
                    <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                </div>
            </div>
            <div class="field">
                <label class="label">Nachricht</label>
                <div class="control">
                    <textarea class="textarea" placeholder=""></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-success">Senden</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
