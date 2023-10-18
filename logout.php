<?php
require 'auth.php';
session_start();
unset($_SESSION["username"]);
header("Location: login.php");
