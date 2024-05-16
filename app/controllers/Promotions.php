<?php

namespace app\controllers;




/**
 * PromotionsController manages actions related to promotional operations.
 */
class Promotions extends \app\core\Controller
{
    /**
     * Creates a new promotion from POST data.
     */


     public function index()
     {
         $promotionModel = new \app\models\Promotions();        
         $allPromotions = $promotionModel->getAllPromos();
         if (!empty($_GET)) {
             $allPromotions = array_filter($allPromotions, function($promotion) {
                 return 
                     (empty($_GET['description']) || $promotion['description'] == $_GET['description'])
                     && (empty($_GET['code']) || $promotion['code'] == $_GET['code'])
                     && (empty($_GET['discountRate']) || $promotion['discountRate'] == $_GET['discountRate'])
                     && (empty($_GET['validFrom']) || $promotion['validFrom'] == $_GET['validFrom'])
                     && (empty($_GET['validTo']) || $promotion['validTo'] == $_GET['validTo']);
             });
         }
     
         // Pass data correctly as an associative array with a 'promotions' key
         $this->view('Promotions/index', ['promotions' => $allPromotions]);
     }
     
     public function getByCode($code)
    {
        $promotionModel = new \app\models\Promotions();
        return $promotionModel->getByCode($code);
    }

    public function applyPromoCode() {
        if (!isset($_POST['promoCode'])) {
            echo json_encode(['isValid' => false]);
            return;
        }
        $promoCode = $_POST['promoCode'];
        $promotionModel = new \app\models\Promotions();
        $promotion = $promotionModel->getByCode($promoCode);
        if ($promotion && new DateTime() >= new DateTime($promotion->validFrom) && new DateTime() <= new DateTime($promotion->validTo)) {
            $discount = $promotion->discountRate / 100;
            $newTotal = ($_SESSION['bookingData']['basePrice'] + $_SESSION['bookingData']['ratePerSquareFoot']) * (1 - $discount);
            echo json_encode(['isValid' => true, 'newTotal' => $newTotal]);
        } else {
            echo json_encode(['isValid' => false]);
        }
    }

     public function create()
     {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $promotion = new \app\models\Promotions();
             $promotion->description = $_POST['description'] ?? '';
             $promotion->code = $_POST['code'] ??'';
             $promotion->discountRate = $_POST['discountRate'] ?? 0;
             $promotion->validFrom = $_POST['validFrom'] ?? date('Y-m-d');
             $promotion->validTo = $_POST['validTo'] ?? date('Y-m-d');
             $promotion->insert();
     
             header('Location: /Promotions/index');// Redirect to a safe URL
             exit(); // Ensure no further code is executed after redirection
         } else {
             $this->view('Promotions/create'); // Show the creation form
         }
     }
     

    /**
     * Deletes an existing promotion.
     */
    public function delete($promotionID)
    {
        $promotionModel = new \app\models\Promotions();
        $promotion = $promotionModel->getPromo($promotionID);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $promotion->delete();
            unset($_SESSION['[promotionID]']);
            header('Location:/Promotions/index');

        } else {
            $this->view('Promotions/delete', ['data' => $promotion]);
        }
    }



    
    public function modify($promotionID)
    {
        $promotionModel = new \app\models\Promotions();
        $detailedPromotion = $promotionModel->getPromo($promotionID);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $detailedPromotion->description = $_POST['description'];
            $detailedPromotion->code = $_POST['code'] ??'';
            $detailedPromotion->discountRate = $_POST['discountRate'];
            $detailedPromotion->validFrom = $_POST['validFrom'];
            $detailedPromotion->validTo = $_POST['validTo'];
            $detailedPromotion->update();

            header('Location: /Promotions/index'); // Redirect to a profile page or other appropriate location
            exit;
        } else {
            $this->view('Promotions/modify', ['data' =>  $detailedPromotion]);  // Pass booking data to view
        }
    }

    // In your Promotions controller
    public function homePage() {
    $promotionModel = new \app\models\Promotions();
    $promotions = $promotionModel->getAllPromos();
    $this->view('Promotions/homePage', ['promotions' => $promotions]);
}

public function apply() {
    if (!isset($_SESSION['bookingData'])) {
        header('Location: /Booking/create');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $promoCode = $_POST['promoCode'];
        $promotion = new \app\models\Promotions();
        $discount = $promotion->getByCode($promoCode);

        if ($discount) {
            $_SESSION['discount'] = $discount->discountRate;
            header('Location: /Payment/create');
            exit();
        } 
    }
    $this->view('Promotions/apply');
}


    // Additional methods for other operations like updating, retrieving, or listing promotions can be added here
}