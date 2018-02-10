<!DOCTYPE html>

<html id="particles-js" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Logout</title>
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Particle/ Animation -->
    <link rel="stylesheet" href="animate.css">
    <script src="particles/particles.js"></script>
</head>
<body>
<script src="particles.js"></script>
<div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Logout erfolgreich</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <footer class="modal-card-foot">
            <a class="button is-info" href="login.php">Zurück zum Login</a>
        </footer>
    </div>
</div>
</body>
<script>particlesJS.load('particles-js', 'particles/particlesjs-config.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>

</html>
