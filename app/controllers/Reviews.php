<?php
namespace app\controllers;

class Reviews extends \app\core\Controller
{

    public function index()
    {
        $reviewsModel = new \app\models\Reviews();
        $reviews = $reviewsModel->getAllWithCustomerDetails();
        $this->view('Reviews/index', ['reviews' => $reviews]);
    }

    public function adminIndex() {
        $reviewsModel = new \app\models\Reviews();
        $reviews = $reviewsModel->getAllWithCustomerDetails(); 
        
        $this->view('Reviews/adminIndex', ['reviews' => $reviews]);  
    }

    public function create()
    {
        if (!isset($_SESSION['customerID'])) {
            header('Location: /Customer/login');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['customerID'])) {
                header('location:/Customer/login');
                exit;
            }

            $review = new \app\models\Reviews();
            $review->customerID = $_SESSION['customerID'];
            $review->rating = $_POST['rating'];
            $review->text = $_POST['text'];

            $review->insert();
            header('location:/Reviews/');
            exit;
        } else {
            $this->view('Reviews/create');
        }
    }

    public function edit($reviewID)
    {
        if (!isset($_SESSION['customerID'])) {
            header('location:/Customer/login');
            exit;
        }

        $reviewsModel = new \app\models\Reviews();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reviewsModel->reviewID = $reviewID;
            $reviewsModel->rating = $_POST['rating'];
            $reviewsModel->text = $_POST['text'];

            if ($reviewsModel->update()) {
                $_SESSION['message'] = 'Review updated successfully.';
                header('location:/Reviews/');
                exit;
            } else {
                $_SESSION['error'] = 'Failed to update the review.';
            }
        }

        $review = $reviewsModel->getById($reviewID);
        if (!$review) {
            $_SESSION['error'] = 'Review not found.';
            header('location:/Reviews/');
            exit;
        }

        $this->view('Reviews/edit', ['review' => $review]);
    }

    public function getById($reviewID) {
        $SQL = 'SELECT * FROM Reviews WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->bindParam(':reviewID', $reviewID, PDO::PARAM_INT);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Review');
        return $STMT->fetch();
    }

    public function delete($reviewID)
    {
        if (!isset($_SESSION['customerID'])) {
            header('Location: /Customer/register');
            exit;
        }

        $reviewsModel = new \app\models\Reviews();
        $review = $reviewsModel->getById($reviewID);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reviewsModel->delete($reviewID);
            if ($reviewsModel->delete($reviewID)) {
                $_SESSION['message'] = 'Review deleted successfully.';
                header('Location: /Reviews/');
                exit;
            } else {
                $_SESSION['error'] = 'Failed to delete review.';
                header('Location: /Reviews/');
                exit;
            }
        } else {
            $this->view('Reviews/delete', $review);
        }
    }

}