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

    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
