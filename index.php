<?php

//Start
require('Config.php');

//Require
require(BACK_SYSTEM . 'core/Settings.php');
require(BACK_SYSTEM . 'core/Url.php');
require(BACK_SYSTEM . 'core/Controller.php');
//require(BACK_SYSTEM . 'core/Session.php');
//require(BACK_SYSTEM . 'core/Security.php');
require(BACK_SYSTEM . "core/Output.php");
require(BACK_SYSTEM . 'core/Connection.php');
require(BACK_SYSTEM . 'core/Util.php');
require(BACK_SYSTEM . 'core/Error.php');

//Modules
//require(back_system. modules autoload);
//require(BACK_SYSTEM. 'modules/console.php');
//require(BACK_SYSTEM. 'modules/dBug.php');
//require(BACK_SYSTEM.'modules/Header.php');

require(BACK_SYSTEM. "start.php");

//Engine
$Settings = new Settings();
$Error = new ErrorMangent();
$Url = new Url();
$Output = new Output();
$Util = new Util();
$Connection = new Connection();
$Controller = new Controller();
$Header = "Header"; //TODO: Headers before sent some data, compression...

$Controller->exec_function();

Connection::$CONN->close();