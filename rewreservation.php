<?php include("isLogedIn.php") ?>
<!DOCTYPE html>
<html style="height: 100%">
<head>
    <meta charset="utf-8">
    <title>Startseite</title>
    <script src="Script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- for the Calendar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/moment.js"></script>
    <link rel="stylesheet" href="pg-calendar-master/dist/css/pignose.calendar.min.css">
    <script src="pg-calendar-master/dist/js/pignose.calendar.min.js"></script>
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
            <li><a href="Reservation.php" style="color: white;">meine Reservierungen</a></li>
            <li class="is-active"><a style="color: white;">neue Reservierung</a></li>
        </ul>
    </div>
    <div class="" style="padding: 0.05em 2% 0.2% 2%;"> <!-- Content -->
        <div class="column">
            <div class="calendar is-centered">
                <script>$(function () {
                        $('.calendar').pignoseCalendar();
                    });</script>
            </div>
        </div>
        <div class="columns is-variable" style="margin: 0 0 20px 0; background-color: grey; ">
            <!-- Place and Date Selection-->
            <div class="column is-2"> <!--Date-->
                <input type="text" id="text-calendar" class="input calendar" /><script>$(function() {
                        $('input.calendar').pignoseCalendar({
                            format: 'YYYY-MM-DD' // date format string. (2017-02-02)
                        });
                    });</script>
            </div>
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
                            <span>Plätze</span>
                            <span class="icon is-small">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                        <div class="dropdown-content">
                            <a href="" class="dropdown-item"> Platz 1 </a>
                            <a href="" class="dropdown-item"> Platz 2 </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="column is-2">
                <button class="button is-primary">Platz reservieren</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
