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
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
            exit;
        }

        $reviewsModel = new \app\models\Reviews();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reviewsModel->reviewID = $reviewID;
            $reviewsModel->customerID = $_SESSION['customerID'];
            $reviewsModel->rating = $_POST['rating'];
            $reviewsModel->text = $_POST['text'];
            $reviewsModel->update();

            header('location:/Reviews/index');
            exit;
        } else {
            $review = $reviewsModel->getById($reviewID);
            if ($review) {
                $this->view('Reviews/edit', ['review' => $review]);
            } else {
                echo "Review not found.";
                exit;
            }
        }
    }

    #[\app\filters\HasProfile]
    public function delete($reviewID)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $review = new \app\models\Reviews();
            $review->reviewID = $reviewID;
            $review->delete();
            header('location:/Reviews/index');
        } else {
            $this->view('Reviews/delete', ['reviewID' => $reviewID]);
        }
    }
}