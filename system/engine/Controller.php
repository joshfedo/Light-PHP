<?php
class Controller{

	var $file;
	var $class;
	var $data;
	var $method;

	public function __construct(){

		$route = Url::$controller;
		$url_split = explode('/', $route);
		$this->file = CONTROLLER . $url_split[0] . '/' . $url_split[1] . 'Controller.php';
		$this->class = $url_split[1] . 'Controller';

		if(count($url_split) === 2){
			$this->method = 'index';
		}else{
			$this->method = $url_split[2];
		}

	}

	public function execController(){

		$this->checkController();

		//Action
		$controller_class = new $this->class();
		$method = $this->method;
		$controller_class->$method();
	}

	public function execRest(){
		
		$this->checkController();
		
		$data = $_GET;
		unset($data['rest']);
		$data = array_values($data);

		$controller_class = new $this->class();
		$method = $this->method;
		$output = call_user_func_array(array($controller_class,$method),$data);
		
		return $output;
	}

	function checkController(){

		//File
		if (!file_exists($this->file)) {
			$this->file = CONTROLLER . 'error/errorController.php';
			$this->method = 'notFound';
			$this->class = 'errorController';
		}

		//Method
		require_once($this->file);
		if (method_exists($this->class, $this->method) === false) {
			$this->file = CONTROLLER . 'error/errorController.php';
			$this->method = 'notFound';
			$this->class = 'errorController';
			require_once($this->file);
		}
	}

}