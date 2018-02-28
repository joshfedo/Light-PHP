<?php

//Conn
$temp_con = mysqli_connect(CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
mysqli_set_charset($temp_con,"utf8");
Connection::$CONN = $temp_con;

//Url
if(isset($_SERVER['HTTPS'])){ 
	Url::$host = 'https://'.$_SERVER['HTTP_HOST'];
	Url::$protocol = "https";
}else{
	Url::$host = 'http://'.$_SERVER['HTTP_HOST'];
	Url::$protocol = "http";
}

if(isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
	Url::$action = $_REQUEST['route'];
	Url::$type = 'controller';
}
if(isset($_REQUEST['model']) && !isset($_REQUEST['route'])){
	Url::$action = $_REQUEST['model'];
	Url::$type = 'rest';
}
if(!isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
	Url::$action = 'index/index';
	Url::$type = 'controller';
}

//Settings
Settings::set("site_name", "Backend");
Settings::set("site_description", "Backend");
Settings::set("site_creator", "David Baqueiro Santerbás");

Settings::set("ftp_path", "/httpdocs");
Settings::set("ftp_path_upload", "/httpdocs/site/upload");
Settings::set("ftp_path_download", "/httpdocs/site/downloads");
Settings::set("ftp_path_files", "/httpdocs/site/util");
Settings::set("ftp_main_route", "C:/xampp/htdocs/");

Settings::set("email_name", "***");
Settings::set("email_server", "***");
Settings::set("email_account", "***");
Settings::set("email_pass", "***");
Settings::set("email_timeout", "***");

Settings::set("image_cache_size_small", "***");
Settings::set("image_cache_size_medium", "***");
Settings::set("image_cache_size_big", "***");

Settings::set('cache_version', '0.01');

//Error
ErrorManagent::$error_handle = 'developing';
set_error_handler( array(new ErrorManagent(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//Loader
Loader::$scripts = array();
Loader::$styles = array();
