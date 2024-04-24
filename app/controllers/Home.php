<?php
// Home Controller
namespace app\controllers;

class Home extends \app\core\Controller {
	public function index(){
		$this->view('Home/index');
	}

	public function service(){
		$this->view('Home/Service');
	}

	public function complete(){
		$this->view('Home/Complete');
	}
}