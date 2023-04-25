<?php include "config.php";
if(isset($_REQUEST['time'])){
    $_SESSION['lastSentCodeTime'] = sqi($_REQUEST['time']);
    echo 'true';
    return;
}
