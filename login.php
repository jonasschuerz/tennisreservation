<?php
require('Database.php');
require ('AccountSession');

if (isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        header("Location: index.php");
        die();
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
}
?>
<!DOCTYPE html>
<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./bulma/css/bulma.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
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
        <form action="?login=1" method="post">
            <div class="block">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" maxlength="250" placeholder="Email" name="email">
                    <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
                </p>
            </div>
            <div class="block">
                <p class="control has-icons-left">
                    <input class="input" type="password" maxlength="250" placeholder="Password" name="passwort">
                    <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
                </p>
            </div>
            <div class="block">
                <p class="control">
                    <button class="button is-success" type="submit">
                        <i class="fas fa-sign-in-alt"></i>
                        &nbsp;
                        Login
                    </button>
                </P>
            </div>
        </form>
    </div>
</div>
</body>
</html>