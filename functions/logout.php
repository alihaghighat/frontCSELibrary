<?php
include_once("config.php");
unset($_SESSION['employeeId']);
setcookie('token', null, time() - 3600, "/");
echo "true";
return;