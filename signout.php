<?php
require_once './functions.php';
startMySession();
session_destroy();
header("location: index.php");