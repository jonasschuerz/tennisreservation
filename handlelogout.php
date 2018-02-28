<?php
    require('Back-End/AccountSession.php');
    if(AccountSession::logout()){
        echo "true";
    }
    echo "false";
