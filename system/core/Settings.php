<?php
class Settings{

	private static $settings;
	
	public static function get($key){
		if(isset(Settings::$settings[$key])){
			return Settings::$settings[$key];
		}else{
			return null;
		}
	}

	public static function set($key, $value =""){
		Settings::$settings[$key] = $value;
	}
}