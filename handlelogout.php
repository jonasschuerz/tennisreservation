<?php
    require('AccountSession.php');
    if(AccountSession::logout()){
        echo "true";
    }
    echo "false";
