<?php
    include("../db/UserInformation.php");
    echo "My Ip Address :".UserInfo::get_ip()."<br>";
    echo "My Ip OS :".UserInfo::get_os()."<br>";
    echo "My Browser :".UserInfo::get_browser()."<br>";
    echo "My Device :".UserInfo::get_device()."<br>";
    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

    echo "My Name Computer :".$hostname;
?>