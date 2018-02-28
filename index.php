<?php

//Config
require('Config.php');

//Engine
require(BACK_SYSTEM . 'core/Settings.php');
require(BACK_SYSTEM . 'core/Url.php');
require(BACK_SYSTEM . 'core/Controller.php');
//require(BACK_SYSTEM . 'core/Session.php');
//require(BACK_SYSTEM . 'core/Security.php');
require(BACK_SYSTEM . "core/Output.php");
require(BACK_SYSTEM . 'core/Connection.php');
require(BACK_SYSTEM . 'core/Util.php');
require(BACK_SYSTEM . 'core/ErrorManagent.php');
require(BACK_SYSTEM . 'core/Loader.php');

require(BACK_SYSTEM. "Start.php");

$Controller = new Controller();
$Controller->exec_function();

Connection::$CONN->close();