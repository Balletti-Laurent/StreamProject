<?php

// Base de données
define('HOST', '127.0.0.1');
define('DBNAME', 'streamProject');
define('LOGIN', 'Laurent');
define('PASSWORD', 'Yasmina');

include 'models/database.php';
include 'models/useraccount.php';
include 'models/typeofstream.php';
include 'models/typeofgame.php';
include 'models/department.php';
include 'models/article.php';
session_start();
?>