<?php include("isLogedIn.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Context</title>
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
<p style="line-height: 150%">Context</p>
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Von</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="Name">
                <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Überschrift</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input class="input is-danger" type="text" placeholder="Inhalt">
            </div>
            <p class="help is-danger">
                This field is required
            </p>
        </div>
    </div>
</div>
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Frage</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <textarea class="textarea" placeholder="Beschreiben sie wie wir Ihnen helfen können."></textarea>
            </div>
        </div>
    </div>
</div>
<div class="field is-horizontal">
    <div class="field-label">
        <!-- Left empty for spacing -->
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <button class="button is-primary">
                    Nachricht senden
                </button>
            </div>
        </div>
    </div>
</div>
</body>
<script>particlesJS.load('particles-js', 'particles/particlesjs-config.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>

</html>
