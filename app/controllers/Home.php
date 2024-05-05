<?php

namespace app\controllers;

class Home extends \app\core\Controller {
	public function index(){
		$this->view('Home/index');
	}

	public function complete(){
		$this->view('Home/Complete');
	}

	public function profile(){
		$this->view('Customer/update');
	}
}