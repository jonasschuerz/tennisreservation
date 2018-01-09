<?php include("isLogedIn.php") ?>
<!DOCTYPE html>
<html style="height: 100%; background-color: #606060;">
<head>
  <meta charset="utf-8">
  <title>Startseite</title>
  <script src="Script.js"></script>
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
  <div class="" style="background-color: #D3D3D3">
    <div class="tabs is-centered" style="background-color: grey; "> <!--Tab (meine Reservierungen, neue Reservierung)-->
      <ul>
        <li><a href="MyReservations.php"style="color: white;">meine Reservierungen</a></li>
        <li class="is-active"><a style="color: white;">neue Reservierung</a></li>
      </ul>
    </div>
    <div class="" style="padding: 0.05em 2% 2% 2%;"> <!-- Content -->
      <div class="columns is-variable" style="margin: 0 0 20px 0; background-color: grey; "> <!-- Place and Date Selection-->
        <div class="column is-2" > <!--Date-->
          <input placeholder="Date" class="input is-hovered" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
        </div>
        <div class="column is-2" > <!--Time-->
          <input placeholder="Uhrzeit" class="input is-hovered" type="text" onfocus="(this.type='time')" onblur="(this.type='text')">
        </div>
        <div class="column is-2" > <!--Places-->
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
      </div>
      <div class="" style="background-color: grey; "> <!--freie Reservierungen-->
        <table class="table" style="width:100%">
          <thead>
            <tr>
              <th> </th>
              <th> Von </th>
              <th> Bis </th>
              <th> Platz </th>
              <th> Status </th>
            </tr>
          </thead>
          <tfoot>
            <tr> <th> Elemente </th> <th> </th><th> </th><th> </th><th> </th></tr>
          </tfoot>
          <tbody>
            <tr>
              <td>
                <label class="checkbox">
                  <input type="checkbox">
                </label>
              </td>
              <td> von </td>
              <td> bis </td>
              <td> PlatzNR </td>
              <td> Status </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox">
                  <input type="checkbox">
                </label>
              </td>
              <td> Von </td>
              <td> Bis </td>
              <td> 2PlatzNR </td>
              <td> 2Status </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="" style="background: grey; padding: 0.75em;"> <!--Buttons-->
        <a class="button is-success " style=""> Auswahl Reservieren</a>
      </div>
    </div>
  </div>
</body>
</html>
