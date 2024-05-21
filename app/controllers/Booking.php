<?php

namespace app\controllers;

/**
 * BookingController handles the web requests related to bookings.
 */
class Booking extends \app\core\Controller
{
    /**
     * Creates a new booking with provided data.
     */
    public function create()
    {
        $langParam = isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en';

        if (!isset($_SESSION['customerID'])) {
            header('Location: /Customer/login' . $langParam);
            exit;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingData = [
                'customerID' => $_SESSION['customerID'],
                'bookingDate' => $_POST['bookingDate'],
                'bookingTime' => $_POST['bookingTime'],
                'status' => "Scheduled",
                'frequency' => $_POST['frequency'] ?? null,
                'description' => $_POST['description'],
                'category' => $_POST['category'],
                'area' => $_POST['area'],
                'message' => $_POST['frequencyMessage'] ?? null,
                'promoCode' => $_POST['promoCode'] ?? null,
            ];

            if ($bookingData['category'] == 'Commercial') {
                $bookingData['basePrice'] = 250;
                $bookingData['ratePerSquareFoot'] = 25.50 * $bookingData['area'];
            } else {
                $bookingData['basePrice'] = 100;
                $bookingData['ratePerSquareFoot'] = 15.75 * $bookingData['area'];
            }

            if (!empty($bookingData['promoCode'])) {
                $promotionModel = new \app\models\Promotions();
                $promotion = $promotionModel->getByCode($bookingData['promoCode']);
                if ($promotion && date('Y-m-d') >= $promotion->validFrom && date('Y-m-d') <= $promotion->validTo) {
                    $discountAmount = ($bookingData['basePrice'] + $bookingData['ratePerSquareFoot']) * ($promotion->discountRate / 100);
                    $bookingData['totalPrice'] = $bookingData['basePrice'] + $bookingData['ratePerSquareFoot'] - $discountAmount;
                } else {
                    $bookingData['totalPrice'] = $bookingData['basePrice'] + $bookingData['ratePerSquareFoot'];
                    $_SESSION['error'] = "Invalid or expired promotion code.";
                }
            } else {
                $bookingData['totalPrice'] = $bookingData['basePrice'] + $bookingData['ratePerSquareFoot'];
            }

            // session_start();
            $_SESSION['bookingData'] = $bookingData;

            // Redirect to Payment/create
            header('Location: /Promotions/apply' . $langParam);
            exit();
        } else {
            $this->view('Booking/create');
        }
    }



    // Additional controller methods for other actions can be added here
    public function getAll()
    {

        // Instantiate Booking model
        $booking = new \app\models\Booking();

        // Call method to get all bookings
        $allBookings = $booking->getAllBookings();

        // Here, you can do something with $allBookings, like passing it to a view for display
        // Or you can directly send a JSON response, etc.

        // For example, if you want to pass it to a view:
        $this->view('Admin/index', ['bookings' => $allBookings]);

    }

    public function delete($bookingID)
    {
        $langParam = isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en';

        $paymentModel = new \app\models\Payment();
        $bookingModel = new \app\models\Booking();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Delete related payments
            $paymentModel->deleteByBookingID($bookingID);

            // Delete the booking
            $bookingModel->delete($bookingID);

            unset($_SESSION['bookingID']);
            header('Location:/' . $langParam);
        } else {
            $booking = $bookingModel->getForBooking($bookingID);
            $this->view('Booking/delete', ['booking' => $booking]);
        }
    }

    public function applyPromoCode()
    {
        if (!isset($_POST['promoCode']) || !isset($_SESSION['bookingData'])) {
            return $this->render('error'); // Simplified error handling
        }

        $promoCode = $_POST['promoCode'];
        $promotionsModel = new \app\models\Promotions();
        $promotion = $promotionsModel->getByCode($promoCode);

        if ($promotion) {
            $discount = $promotion->discountRate / 100;
            $totalPrice = ($_SESSION['bookingData']['basePrice'] + $_SESSION['bookingData']['ratePerSquareFoot']) * (1 - $discount);
            $_SESSION['bookingData']['totalPrice'] = $totalPrice;
            return $this->render('payment_page', ['totalPrice' => $totalPrice, 'discountApplied' => true]); // Pass the new total to the view
        } else {
            return $this->render('payment_page', ['error' => 'Invalid promo code']); // Pass error to the view
        }
    }

    // Display booking completion details
    public function complete($bookingID)
    {
        $bookingModel = new \app\models\Booking();
        $paymentModel = new \app\models\Payment();
        $detailedBooking = $bookingModel->getForBooking($bookingID);
        $detailedPayment = $paymentModel->getForBooking($bookingID);
        $this->view('Booking/complete', ['booking' => $detailedBooking, 'payment' => $detailedPayment]);
    }

    // Modifies an existing booking
    public function modify($bookingID)
    {
        $langParam = isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en';

        $bookingModel = new \app\models\Booking();
        $detailedBooking = $bookingModel->getForBooking($bookingID);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $detailedBooking->bookingDate = $_POST['bookingDate'];
            $detailedBooking->bookingTime = $_POST['bookingTime'];
            $detailedBooking->frequency = $_POST['Frequency'];
            $detailedBooking->status = 'Scheduled';
            $detailedBooking->message = $_POST['frequencyMessage'] ?? null;
            $detailedBooking->update();

            header('Location: /Booking/complete/' . $detailedBooking->bookingID . $langParam);
            exit;
        } else {
            $this->view('Booking/modify', ['data' => $detailedBooking]);  // Pass booking data to view
        }
    }
}