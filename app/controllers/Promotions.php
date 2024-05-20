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
     
     public function paymentPromotion() {
        if (!isset($_SESSION['bookingData'])) {
            header('Location: /Booking/create');
            exit();
        }
    
        // Check for any existing promo data in session
        if (isset($_SESSION['bookingData']['promoCode'])) {
            // Assuming there's already logic that calculates the new price with promo applied
            $bookingData = $_SESSION['bookingData'];
            $this->view('Promotions/paymentPromotion', ['booking' => $bookingData]);
        } else {
            // Redirect back if no promo code has been applied yet
            header('Location: /Payment/create');
            exit();
        }
    }
    
     public function getByCode($code)
    {
        $promotionModel = new \app\models\Promotions();
        return $promotionModel->getByCode($code);
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

    public function applyPromo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promoCode'])) {
            $promoCode = $_POST['promoCode'];
            $promotionModel = new \app\models\Promotions();
            $promotion = $promotionModel->getByCode($promoCode);

            if ($promotion && $promotion->validTo >= date('Y-m-d')) {
                echo json_encode(['success' => true, 'discountRate' => $promotion->discountRate]);
            } else {
                echo json_encode(['success' => false]);
            }
        }
        exit();
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
        $discountData = $promotion->getByCode($promoCode);

        if ($discountData && isset($discountData['discountRate'])) {
            $discountRate = floatval($discountData['discountRate']); // Convert to numeric value

            $totalPrice = $_SESSION['bookingData']['totalPrice'];

            if ($discountRate != 0) {
                $priceOFF = $totalPrice / $discountRate;
                $finalPrice = $totalPrice - $priceOFF;
                $_SESSION['finalPrice'] = $finalPrice;
                header('Location: /Payment/create');
                exit();
            } else {
                // Handle division by zero
                $_SESSION['error'] = "Discount value cannot be zero.";
                header('Location: /Promotions/apply');
                exit();
            }
        } else {
            // Handle the case where the discount code is not found or discountRate is missing
            $_SESSION['error'] = "Promotion code not found or invalid discount rate.";
            header('Location: /Promotions/apply');
            exit();
        }
    }
    $this->view('Promotions/apply');
}

    // Additional methods for other operations like updating, retrieving, or listing promotions can be added here
}