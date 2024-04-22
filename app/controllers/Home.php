<?php
// Home Controller
namespace app\controllers;

class Home extends \app\core\Controller {
	public function index(){
		$this->view('Home/index');
	}
}