<?php

    require_once('bootstrap.php');
    require_once('settings.php');
    require_once('common.php');

    if (function_exists('session_start')) { //old php comaptibility
        session_start();
    } // use session variables}

    if (array_key_exists('HTTP_REFERER', $_SERVER)) {

        logm('ok');

        $ref = $_SERVER['HTTP_REFERER'];
        $refData = parse_url($ref);

        if($refData['host'] !== CURR_DOMAIN /*&& $refData['path'] !== LOGIN_PAGE*/) {
            logm('incorrect domain!');
            die("Hotlinking not permitted");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["txtName"]) && isset($_POST["txtPassword"])) {

            $errMsg = '';
            $clean = array();

            logm("Hello");

            $usrName = urldecode($_POST["txtName"]);
            //if (ctype_alnum($usrName))
                $clean['txtName'] = $usrName;

            $usrPassword = urldecode($_POST["txtPassword"]);
            //if (ctype_alnum($usrPassword))
                $clean['txtPassword'] = $usrPassword;

            logm("$usrName and $usrPassword");

            if (array_key_exists('txtName', $clean) && array_key_exists('txtPassword', $clean) && isAuthenticated($clean)) {
                $_SESSION['userName'] = $clean['txtName']; //add to session
                redirect(INDEX_PAGE);
            } else {
                $errMsg = getMsg('badLogin');
            }

        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/mojstil.css" type="text/css"/>
</head>
<body>
<div class="content">
    <?php if (!empty($errMsg)): ?>
        <div class="error"><?php echo $errMsg ?></div>
    <?php endif ?>

    <div id="login">
        <h1>Php Tutorial</h1>
        <span class="description">This is Php5, HTML5, CSS3, Javascript Tutorial application</span>

        <div class="spacer20"></div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div>
                <input tabindex="1" id="txtName" name="txtName" type="text"/>
            </div>
            <div>
                <input tabindex="2" id="txtPassword" name="txtPassword" type="password" autocomplete="off"/>
            </div>
            <input tabindex="3" id="register" name="btnLogin" type="submit" value="Login"/>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/mojskript.js"></script>

</body>
</html>