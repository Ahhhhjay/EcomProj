<?php

namespace app\controllers;

class Home extends \app\core\Controller {
	public function index() {
		$reviewsModel = new \app\models\Reviews();
		$latestReviews = $reviewsModel->getLatestReviews();
		$this->view('Home/index', ['latestReviews' => $latestReviews]);
	}
	

	public function complete(){
		$this->view('Home/Complete');
	}

	public function profile(){
		$this->view('Customer/update');
	}
}