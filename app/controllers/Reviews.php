<?php
namespace app\controllers;

class Reviews extends \app\core\Controller {

    public function index() {
        if (!isset($_SESSION['customerID'])) {
            header('location:/Customer/register');
            exit;
        }

        $reviewsModel = new \app\models\Reviews();
        $reviews = $reviewsModel->getAllWithCustomerDetails();
        $this->view('Reviews/index', ['reviews' => $reviews]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['customerID'])) {
                header('location:/Customer/register');
                exit;
            }

            $review = new \app\models\Reviews();
            $review->customerID = $_SESSION['customerID'];
            $review->rating = $_POST['rating'];
            $review->text = $_POST['text'];

            $review->insert();
            header('location:/Reviews/index');
            exit;
        } else {
            $this->view('Reviews/create');
        }
    }

    public function edit($reviewID) {
        if (!isset($_SESSION['customerID'])) {
            header('location:/User/login');
            exit;
        }

        $reviewsModel = new \app\models\Reviews();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reviewsModel->reviewID = $reviewID;
            $reviewsModel->rating = $_POST['rating'];
            $reviewsModel->text = $_POST['text'];

            if ($reviewsModel->update()) {
                $_SESSION['message'] = 'Review updated successfully.';
                header('location:/Reviews/index');
                exit;
            } else {
                $_SESSION['error'] = 'Failed to update the review.';
            }
        }

        $review = $reviewsModel->getById($reviewID);
        if (!$review) {
            $_SESSION['error'] = 'Review not found.';
            header('location:/Reviews/index');
            exit;
        }

        $this->view('Reviews/edit', ['review' => $review]);
    }

    public function delete($reviewID) {
        if (!isset($_SESSION['customerID'])) {
            header('Location: /Customer/register');
            exit;
        }
    
        $reviewsModel = new \app\models\Reviews();
        if ($reviewsModel->delete($reviewID)) {  // Correctly passing the reviewID
            $_SESSION['message'] = 'Review deleted successfully.';
            header('Location: /Reviews/index');
            exit;
        } else {
            $_SESSION['error'] = 'Failed to delete review.';
            header('Location: /Reviews/index');
            exit;
        }
    }
}