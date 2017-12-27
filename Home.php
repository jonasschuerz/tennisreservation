<?php include("isLogedIn.php") ?>
<!DOCTYPE html>
<html style="height: 100%; background-color: #606060;">
<head>
  <meta charset="utf-8">
  <title>Startseite</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
</head>
<body>
<?php
  if(isset($errorMessage)) {
   echo $errorMessage;
   die();
  }
  include("navbar.php");
?>

</body>
</html>
