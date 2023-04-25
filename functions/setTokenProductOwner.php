<?php
include_once("config.php");
if(isset($_REQUEST['userToken'])){
    $_SESSION['carrierId']=sqi($_REQUEST['userToken']);
    echo "true";
}else{
    echo "false";
}
