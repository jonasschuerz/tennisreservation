<!DOCTYPE html>
<?php require("islogedin.php"); ?>
<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Startseite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- JQuery -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="/js/moment.js"></script>
    <!-- Particle/ Animation -->
    <link rel="stylesheet" href="animate.css">
    <script src="particles/particles.js"></script>

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

</body>
<script>particlesJS.load('particles-js', 'particles/particlesjs-config.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>
</html>