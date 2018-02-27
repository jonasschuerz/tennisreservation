<!DOCTYPE html>
<html lang="de">
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JQuery -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="/js/moment.js"></script>
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
    <link rel="stylesheet" type="text/css" href="css/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<?php
include("navbar.php");
?>
<body>
<div id="particles-js" style="position: absolute; width: 100%; height: 100%;"></div>
<div class="container">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Sende uns eine Nachricht
				</span>

            <label class="label-input100" for="first-name">Name *</label>
            <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
                <input id="first-name" class="input100" type="text" name="Vorname" placeholder="Vorname">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                <input class="input100" type="text" name="last-name" placeholder="Nachname">
                <span class="focus-input100"></span>
            </div>

            <label class="label-input100" for="betreff">Betreff</label>
            <div class="wrap-input100">
                <input id="betreff" class="input100" type="text" name="betreff" placeholder="Inhalt">
                <span class="focus-input100"></span>
            </div>

            <label class="label-input100" for="message">Frage</label>
            <div class="wrap-input100 validate-input" data-validate="Message is required">
                <textarea id="message" class="input100" name="message"
                          placeholder="Beschreiben Sie wie wir Ihnen helfen können"></textarea>
                <span class="focus-input100"></span>
            </div>

            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Nachricht senden
                </button>
            </div>
        </form>

        <div class="contact100-more flex-col-c-m" style="background-image: url('img/bg-02.jpg');">
            <div class="flex-w size1 p-b-47">
                <div class="txt1 p-r-25">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1324.2624437002667!2d14.278645358199476!3d48.408066575318784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47739ea729521423%3A0xd94aac988996c3a1!2sTennisplatz+Sportunion+Kirchschlag!5e0!3m2!1sde!2sat!4v1518170785318"
                            width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <span class="lnr lnr-map-marker"></span>
                </div>

                <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Addresse
						</span>
                    <span class="txt2">
							Haiderweg 1, 4202 Kirchschlag bei Linz
						</span>
                </div>
            </div>

            <div class="dis-flex size1 p-b-47">
                <div class="txt1 p-r-25">
                    <span class="lnr lnr-phone-handset"></span>
                </div>
                <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Telefonnummer
						</span>
                    <span class="txt3">
							+43 664 88 58 38 13
						</span>
                </div>
            </div>

            <div class="dis-flex size1 p-b-47">
                <div class="txt1 p-r-25">
                    <span class="lnr lnr-envelope"></span>
                </div>
                <div class="flex-col size2">
						<span class="txt1 p-b-20">
							Email
						</span>
                    <span class="txt3">
							<a class="txt3" href="mailto:ernarei@gmx.net">
          ernarei(at)gmx.net</a>
						</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
