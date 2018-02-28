<?php
require('Back-End/AccountSession.php');
if (!AccountSession::is_logged_in()) {
    $errorMessage = '<div class="modal is-active">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Login Erforderlich</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <footer class="modal-card-foot">
        <a class="button is-info" href="login.php">Zurück zum Login</a>
      </footer>
    </div>
  </div>';
}
?>
