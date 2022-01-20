<?php

session_start();
if(!isset($_SESSION["unampass"])) header("Location: login.php");