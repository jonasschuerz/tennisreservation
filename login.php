<!DOCTYPE html>
<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bulma -->
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- JQuery -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="/js/moment.js"></script>
    <!-- Particle/ Animation -->
    <link rel="stylesheet" href="animate.css">
    <script src="particles/particles.js"></script>
    <script>
        particlesJS.load('particles-js', 'particles/particlesjs-config.json', function () {
            console.log('callback - particles.js config loaded');
        });
    </script>
    <!-- Growl -->
    <script src="growl/jquery.growl.js" type="text/javascript"></script>
    <link href="growl/jquery.growl.css" rel="stylesheet" type="text/css"/>

    <script src="js/Script.js" type="text/javascript"></script>

</head>
<body>
<div id="particles-js" style="position: absolute; width: 100%; height: 100%;"></div>
<?php
if (isset($errorMessage)) {
    echo '<script>$.growl.error({ message: "Email oder Passwort ist ungültig!", size: "large" });</script>';
}
?>
<div class="section">
    <div class="container"
         style="width: 100%; max-width: 400px; padding: 25px; border-radius: 25px; background-color: #4d4d4d;">
        <div class="field" style="padding-bottom: 5%; width:100%;">
            <figure class="image is-128x128" style="margin: auto;">
                <img class="img" style="text-align: center;" src="img/loginpic.png"/>
            </figure>
        </div>
        <div class="block">
            <p class="control has-icons-left has-icons-right">
                <input class="input" type="email" maxlength="250" placeholder="Email" id="email">
                <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
            </p>
        </div>
        <div class="block">
            <p class="control has-icons-left">
                <input class="input" type="password" maxlength="250" placeholder="Passwort" id="password">
                <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
            </p>
        </div>
        <div class="block">
            <p class="control">
                <button id="login" class="button is-success" type="submit">
                    <i class="fas fa-sign-in-alt"></i>
                    &nbsp;
                    Login
                </button>
            </P>
        </div>
    </div>
</div>
</body>
</html>
