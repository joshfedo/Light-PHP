<?php
class indexController extends Engine{

	public function index(){	
		$this->output->load(BACK_VIEW.'pags/welcome/welcomeView.php',array());
	}
}