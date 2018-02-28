<?php

//Config
require('Config.php');

//Engine
require(BACK_SYSTEM . 'engine/Settings.php');
require(BACK_SYSTEM . 'engine/Url.php');
require(BACK_SYSTEM . 'engine/Controller.php');
//require(BACK_SYSTEM . 'engine/Session.php');
//require(BACK_SYSTEM . 'engine/Security.php');
require(BACK_SYSTEM . "engine/Output.php");
require(BACK_SYSTEM . 'engine/Connection.php');
require(BACK_SYSTEM . 'engine/Util.php');
require(BACK_SYSTEM . 'engine/ErrorManagent.php');
require(BACK_SYSTEM . 'engine/Loader.php');

require(BACK_SYSTEM. "Start.php");

$Controller = new Controller();
$Controller->exec_function();

Connection::$CONN->close();