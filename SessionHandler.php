<?php
    error_reporting(E_ERROR | E_PARSE);
    include_once '../sql/Database.php';
    include_once 'AccountSession.php';
    include_once '../manager/Whitelist.php';
    include_once '../manager/PublicKey.php';
    include_once '../manager/Protocol.php';
    include_once '../manager/Account.php';

if(AccountSession::is_logged_in()) {
        if (isset($_GET['method'])) {
            if($_GET['method'] === "rfw") { //REMOVE FROM WHITELIST
                if(!isset($_GET['host'])) {
                    echo '{"error":"true", "desc":"Too few arguments!"}';
                    die();
                }

                $host = $_GET['host'];

                if(!filter_var($host, FILTER_VALIDATE_IP)) {
                    echo '{"error":"true", "desc":"Not a valid IP-Address!"}';
                    die();
                }
                if(!Whitelist::contains(AccountSession::load()->get_id(), $host)) {
                    echo '{"error":"true", "desc":"Given host is not listed on the whitelist!"}';
                    die();
                }
                $res = Whitelist::remove(AccountSession::load()->get_id(), $host);
                if($res) {
                    echo '{"error":"false", "desc":"Host removed from whitelist!"}';
                    Protocol::log("Removed from whitelist", $_SERVER['REMOTE_ADDR'], AccountSession::load()->get_id(), $host);
                    die();
                }else{
                    echo '{"error":"true", "desc":"Host could not be removed from whitelist!"}';
                    die();
                }
            }elseif ($_GET['method'] === "atw") { //ADD TO WHITELIST
                if(!isset($_GET['host'])) {
                    echo '{"error":"true", "desc":"Too few arguments!"}';
                    die();
                }

                $host = $_GET['host'];

                if(!filter_var($host, FILTER_VALIDATE_IP)) {
                    echo '{"error":"true", "desc":"Not a valid IP-Address!"}';
                    die();
                }
                if(Whitelist::contains(AccountSession::load()->get_id(), $host)) {
                    echo '{"error":"true", "desc":"Given host is already on the whitelist!"}';
                    die();
                }
                $res = Whitelist::add(AccountSession::load()->get_id(), $host, 0);
                if($res) {
                    echo '{"error":"false", "desc":"Host added to whitelist!"}';
                    Protocol::log("Added to whitelist", $_SERVER['REMOTE_ADDR'], AccountSession::load()->get_id(), $host);
                    die();
                }else{
                    echo '{"error":"true", "desc":"Failed adding host to whitelist!"}';
                    die();
                }
            }elseif ($_GET['method'] === "lwl") { //LOAD WHITELIST
                $list = AccountSession::load()->get_whitelist();
                echo json_encode($list);
                die();
            }elseif ($_GET['method'] === 'gnk') { //GENERATE NEW KEY
                $res = PublicKey::generate(AccountSession::load()->get_id());
                $fr = AccountSession::load()->get_public_key();
                if($res && $fr !== false) {
                    echo '{"error":"false", "desc":"Generated a new public key!", "key":"' . $fr . '"}';
                    Protocol::log("Generate Key", $_SERVER['REMOTE_ADDR'], AccountSession::load()->get_id(), "None");
                    die();
                }else{
                    echo '{"error":"true", "desc":"Could not generate a new public key!"}';
                    die();
                }
            }elseif ($_GET['method'] === 'sld') { //SEARCH LOG DATA
                if(!isset($_GET['hint'])) {
                    echo '{"error":"true", "desc":"Too few arguments!"}';
                    die();
                }

                $hint = $_GET['hint'];

                $data = Protocol::search($hint);
                if($data === false) {
                    echo '{"error":"true", "desc":"There was a server error!"}';
                    die();
                }

                echo json_encode($data);
                die();
            }elseif ($_GET['method'] === 'gpd') { //GET PRICE DATA
                $data = Protocol::get_price();
                if($data === false) {
                    echo '{"error":"true", "desc":"Could not load price data for XMR!"}';
                    die();
                }
                echo $data;
                die();
            }elseif ($_GET['method'] === 'alo') {
                if(isset($_GET['reason'])) {
                    $id = AccountSession::load()->get_id();
                    $res = AccountSession::load()->logout();
                    if(empty($_GET['reason']))
                        $_GET['reason'] = "No reason";
                    Protocol::log("Logout", $_SERVER['REMOTE_ADDR'], $id, $_GET['reason']);
                    if ($res) {
                        echo '{"error":"false", "desc":"You have been logged out!"}';
                        die();
                    } else {
                        echo '{"error":"true", "desc":"Could not logout!"}';
                        die();
                    }
                }else{
                    echo '{"error":"true", "desc":"Too few arguments!"}';
                    die();
                }
            }
        }else{
            echo '{"error":"true", "desc":"This request is not available!"}';
            die();
        }
    }else{
        if(isset($_GET['method'])) {
            if($_GET['method'] === 'eal') {
                if(isset($_GET['email']) && isset($_GET['password'])) {
                    $mail = $_GET['email'];
                    $pw = $_GET['password'];

                    if(preg_match( '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD', $mail) !== 1) {
                        echo '{"error":"true", "desc":"Not a valid Email!"}';
                        die();
                    }

                    if(Account::login($mail, $pw)) {
                        AccountSession::login($mail, Account::get("email", $mail)->id);
                        Protocol::log("Login", $_SERVER['REMOTE_ADDR'], AccountSession::load()->get_id(), "None");
                        echo '{"error":"false", "desc":"Successfully logged in!"}';
                        die();
                    }else{
                        echo '{"error":"true", "desc":"Password and/or Email is not valid!"}';
                        die();
                    }
                }else{
                    echo '{"error":"true", "desc":"Too few arguments!"}';
                    die();
                }
            }
        }
        echo '{"error":"true", "desc":"You are not logged in!"}';
        die();
    }