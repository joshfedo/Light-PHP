<?php

//Config
require('config.php');

//Load
require(SYSTEM . 'engine/Config.php');
require(SYSTEM . 'engine/Url.php');
require(SYSTEM . 'engine/Session.php');
require(SYSTEM . 'engine/Output.php');
require(SYSTEM . 'engine/Connection.php');
require(SYSTEM . 'engine/Util.php');
require(SYSTEM . 'engine/Errors.php');

//Bootstrap
require("../config_data.php");
require(SYSTEM. "Start.php");

//Errors
error_reporting(E_ALL);
set_error_handler(array(new Errors(),"my_error_handler") ,E_ALL);

//Admin
require(SYSTEM."engine/SecAdmin.php");
$admin = new SecAdmin();

//Composer
require(SYSTEM."libraries/vendor/autoload.php");

//Execute controller
$Controller = $admin->checkSession();
$Controller->execController();

//DB
Connection::$CONN->close();