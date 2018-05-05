<?php
    session_start();
    $_SESSION["user"]=NULL;
    $_SESSION["email"]=NULL;
    $_SESSION["id"]=NULL;
    header("location: login.html");
?>

