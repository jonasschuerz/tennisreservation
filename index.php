<?php include("isLogedIn.php") ?>
<!DOCTYPE html>
<html id="particles-js" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Startseite</title>
    <script src="Script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/moment.js"></script>
    <!-- Particle/ Animation -->
    <link rel="stylesheet" href="animate.css">
    <script src="particles/particles.js"></script>
</head>
<body>
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
    die();
}
include("navbar.php");
?>
<script src="particles.js"></script>

</body>
<script>particlesJS.load('particles-js', 'particles/particlesjs-config.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>
</html>