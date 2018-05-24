<!DOCTYPE html>
<?php require("Back-End/islogedin.php"); ?>
<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <title>Startseite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JQuery -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/moment.js"></script>
    <!-- Particle/ Animation -->
    <link rel="stylesheet" href="./css/animate.css">
    <!-- Bulma CSS-->
    <link rel="stylesheet" href="./css/bulma.css">
    <link rel="stylesheet" href="./css/bulma-radio-checkbox.css">
    <!-- Icons-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- for the Date -->
    <!-- for the Time -->
    <!-- Notifications -->
    <script src="growl/jquery.growl.js" type="text/javascript"></script>
    <link href="growl/jquery.growl.css" rel="stylesheet" type="text/css"/>
    <!-- fullCalendar-->
    <!-- MyScript -->
    <script src="js/Script.js"></script>
    <!-- MyStyle Options -->
    <link rel="stylesheet" href="./css/myCss.css"/>
    <link rel="stylesheet" href="./css/styleForAdmin.css"
</head>
<body>
<?php
if (isset($errorMessage)) {
    echo $errorMessage;
    die();
}
include("navbar.php");
?>
<div class="container" style="background-color: rgba(128,128,128, 0.9);">
    <div class="columns">
        <div class="column is-3">
            <aside class="menu" style="background: hsl(141, 71%, 48%); color: white!important;">
                <ul class="menu-list">
                    <li class="heading">Spieler Verwaltung</li>
                    <li><a href="#spieHinz">Spieler hinzufügen</a</li>
                    <li><a>Spieler löschen</a></li>
                    <li><a>Spieler updaten</a></li>
                    <li class="heading">Plätze Verwaltung</li>
                    <li><a href="#plaetzeHinz"> Platz hinzufügen</a</li>
                    <li><a href="#plaetzeLoesch">Platz löschen</a></li>
                    <li><a href="#plaetzeAendern">Platznummer/name ändern</a></li>
                </ul>

            </aside>

        </div>
        <div class="column">
            <div class="columns" style="width: 95%;">
            </div>
            <div class="is-divider" style="width: 90%; margin: 0 auto;"></div>
            <div class="section" id="spieHinz">
                <div class="columns">
                  <h1>Spieler hinzufügen</h1>
                  <div class="column">
                      <div class="field">
                          <div class="control">
                              <div class="file has-name">
                                  <label class="file-label">
                                      <input class="file-input" type="file" name="resume">
                                      <span class="file-cta">
                              <span class="file-icon">
                                  <i class="fas fa-upload"></i>
                              </span>
                              <span class="file-label">Datei auswählen</span>
                          </span>
                                      <span class="file-name">
                            Hier würde der Dateiname stehen
                          </span>
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="field">
                          <div class="control">
                              <input class="input" type="text" placeholder="Vorname Nachnahme">
                          </div>
                      </div>
                      <div class="field">
                          <div class="control">
                              <input class="input" type="email" placeholder="Email">
                          </div>
                      </div>
                      <div class="field">
                          <div class="control">
                              <a class="button is-success">Hinzufügen</a>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="is-divider" style="width: 90%; margin: 0 auto;"></div>
            <div  class="section" id="plaetzeHinz">
                <h1>Plätze Hinzufügen</h1>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Geben sie die Platz Nummer ein, die Sie hinzufügen möchten.">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <a class="button is-success">Hinzufügen</a>
                    </div>
                </div>
            </div>
            <div class="is-divider" style="width: 90%; margin: 0 auto;"></div>
            <div  class="section" id="plaetzeLoesch">
                <h1>Platz löschen</h1>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Geben sie die Platz Nummer ein, die Sie löschen wollen.">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <a class="button is-success">Löschen</a>
                    </div>
                </div>
            </div>
            <div class="is-divider" style="width: 90%; margin: 0 auto;"></div>
            <div  class="section" id="plaetzeAendern">
                <h1>Platznummer/name ändern</h1>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Geben sie die Platz Nummer ein, die Sie löschen wollen.">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <a class="button is-success">Löschen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!--  <div class="is-divider" style="width: 90%; margin: 0 auto;"></div>
    <div id="headin2"><strong> <h3>Admin page </h3></strong></div>
  <?php
        $user = 'root';
        $password = '';
        $db = 'syp';
        $host = 'localhost';

        $link = mysqli_init();
        $success = mysqli_real_connect(
           $link,
           $host,
           $user,
           $password,
           $db
        );
    ?>
    <?php
        echo "<table width=\"100%\" border=\"0\" id=\"tab\">";
        echo "<tr>";
        echo "<th id=\"td1\">Spieler Nummer</th><th id=\"td2\">Vorname</th>
                  <th id=\"td3\">Nachname</th><th id=\"td4\">Email</th>";
        echo "</tr>";

        $result = mysql_query("SELECT player_id, firstname,lastname,email FROM player");
        while ( $row = mysql_fetch_array($result))
        {
            $SN = $row['player_id'];
            $actitle = $row['firstname'];
            $email = $row['lastname'];
            $gender  = $row['email'];

            echo "<tr>";
            echo "<td>".$SN."</td><td>".$actitle."</td><td>".$email."</td>
                      <td>".$gender."</td>
                      <td>"."<input type=\"button\" name=\"edit\" value=\"Edit\"/>
                      <input type=\"button\" value=\"Delete\" name=\"delete\" >"."</td>";
            echo "</tr>";
        }
    ?> -->
</div>

</body>
</html>
