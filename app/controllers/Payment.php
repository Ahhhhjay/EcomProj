<?php

namespace app\controllers;

class Payment extends \app\core\Controller
{
    public function create()
    {
        if (!isset($_SESSION['bookingData'])) {
            header('Location: /Booking/create');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applyPromo'])) {
            $promoCode = $_POST['promoCode'] ?? '';
            if (!empty($promoCode)) {
                $this->applyPromotion($promoCode);
                // Redirect to a new view that shows the updated price
                header('Location: /Payment/paymentPromotion');
                exit();
            }
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['submitPayment'])) {
            $payment = new \app\models\Payment();
            $payment->customerID = $_SESSION['customerID'];
            $payment->cardName = $_POST['cardName'];
            $payment->cardNumber = $_POST['cardNumber'];
            $payment->expirationDate = $_POST['expirationDate']; // Should be in YYYY-MM-DD format
            $payment->postalCode = $_POST['postalCode'];
            $payment->billingAddress = $_POST['billingAddress'];

            // Complete the booking
            $booking = new \app\models\Booking(); // Ensure this is the model, not the controller
            $bookingData = $_SESSION['bookingData'];

            $booking->customerID = $bookingData['customerID'];
            $booking->bookingDate = $bookingData['bookingDate'];
            $booking->bookingTime = $bookingData['bookingTime'];
            $booking->status = $bookingData['status'];
            $booking->frequency = $bookingData['frequency'];
            $booking->description = $bookingData['description'];
            $booking->category = $bookingData['category'];
            $booking->basePrice = $bookingData['basePrice'];
            $booking->ratePerSquareFoot = $bookingData['ratePerSquareFoot'];
            $booking->message = $bookingData['message'];
            $booking->insert(); // Call the insert method on the Booking model

            // Save the booking ID in the payment record
            $payment->bookingID = $booking->bookingID;
            $payment->insert();

            // Clear session data
            unset($_SESSION['bookingData']);

            // Redirect to booking completion page
            header('Location: /Booking/complete/' . $booking->bookingID);
            exit();
        } else {
            $this->view('Payment/create', ['booking' => $_SESSION['bookingData']]);
        }
    }

    private function applyPromotion($promoCode) {
        $promotionModel = new \app\models\Promotions();
        $promoDetails = $promotionModel->getByCode($promoCode);
        if ($promoDetails) {
            $discount = $promoDetails['discountRate'];
            $currentPrice = $_SESSION['bookingData']['basePrice'] + $_SESSION['bookingData']['ratePerSquareFoot'];
            $discountAmount = $currentPrice * ($discount / 100);
            $newTotal = $currentPrice - $discountAmount;
    
            $_SESSION['bookingData']['totalPrice'] = $newTotal;
            $_SESSION['bookingData']['appliedDiscount'] = $discountAmount;
            $_SESSION['bookingData']['promoCode'] = $promoCode;
            unset($_SESSION['promoError']);  // Clear any previous error messages
        } else {
            $_SESSION['promoError'] = 'Invalid promo code';  // Set the error message
            header('Location: /Payment/create');
            exit();
        }
    }
    

    public function paymentPromotion() {
        if (!isset($_SESSION['bookingData'])) {
            header('Location: /Booking/create');
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitPayment'])) {
            // Assume all required data are still in $_SESSION or are submitted with the form
            $bookingData = $_SESSION['bookingData'];
    
            $payment = new \app\models\Payment();
            $payment->customerID = $bookingData['customerID'];
            $payment->cardName = $bookingData['cardName'];  // Ensure these details are passed from the form or session
            $payment->cardNumber = $bookingData['cardNumber'];
            $payment->expirationDate = $bookingData['expirationDate'];
            $payment->postalCode = $bookingData['postalCode'];
            $payment->billingAddress = $bookingData['billingAddress'];
            $payment->bookingID = $bookingData['bookingID'];  // Ensure this is set when the promo is applied
            $payment->insert();
    
            // You might need to update the booking info if anything changes due to the promo
            $booking = new \app\models\Booking();
            $booking->updateBookingAfterPayment($bookingData);
    
            unset($_SESSION['bookingData']); // Clear the session data
    
            // Redirect to a confirmation or completion page
            header('Location: /Booking/complete/' . $booking->bookingID);
            exit();
        } else {
            // Display the payment promotion page with promo applied
            $bookingData = $_SESSION['bookingData'];
            $this->view('Payment/paymentPromotion', ['booking' => $bookingData]);
        }
    }
    
    // This method finalizes the booking after all data verification from the promotion payment view
    public function completeBooking() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process final booking logic here
            // Redirect to a booking completion page or display confirmation
            header('Location: /Booking/complete/' . $_SESSION['bookingData']['bookingID']);
            exit();
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $paymentID = $_POST['paymentID'] ?? null;
            if ($paymentID) {
                $payment = new \app\models\Payment();
                $payment->paymentID = $paymentID;

                try {
                    $payment->delete();
                    header('Location: /Payment/deleted');
                } catch (\Exception $e) {
                    header('Location: /Payment/error');
                }
            } else {
                header('Location: /Payment/error');
            }
        }
    }
}