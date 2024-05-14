<?php

namespace app\controllers;

use app\models\Booking as BookingModel;
use app\models\Payment as PaymentModel;


/**
 * BookingController handles the web requests related to bookings.
 */
class Booking extends \app\core\Controller
{
    /**
     * Creates a new booking with provided data.
     */


<<<<<<< HEAD
     public function create()
     {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $bookingData = [
                 'customerID' => $_SESSION['customerID'],
                 'bookingDate' => $_POST['bookingDate'],
                 'bookingTime' => $_POST['bookingTime'],
                 'status' => "Scheduled",
                 'frequency' => $_POST['frequency'] ?? null,
                 'description' => $_POST['description'],
                 'category' => $_POST['category'],
                 'area' => $_POST['area']
             ];
 
             if ($bookingData['category'] == 'Commercial') {
                 $bookingData['basePrice'] = 250;
                 $bookingData['ratePerSquareFoot'] = 25.50 * $bookingData['area'];
             } else {
                 $bookingData['basePrice'] = 100;
                 $bookingData['ratePerSquareFoot'] = 15.75 * $bookingData['area'];
             }
 
=======
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $booking = new \app\models\Booking();

            $booking->customerID = $_SESSION['customerID'];
            $booking->bookingDate = $_POST['bookingDate'];
            $booking->bookingTime = $_POST['bookingTime'];
            $booking->status = "Scheduled";
            $booking->frequency = $_POST['frequency'] ?? null;
            $booking->description = $_POST['description'];
            $booking->category = $_POST['category'];
            if ($booking->category == 'Commercial') {
                $booking->basePrice = 250;
                $booking->ratePerSquareFoot = 25.50 * $_POST['area'];
            } else {
                $booking->basePrice = 100;
                $booking->ratePerSquareFoot = 15.75 * $_POST['area'];
            }
            $booking->message = $_POST['frequencyMessage'] ?? null;
            
            $booking->insert();

            header('Location: /Booking/complete/' . $booking->bookingID);
        } else {
            $this->view('Booking/create');
        }
    }
>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296

             session_start();
             $_SESSION['bookingData'] = $bookingData;
 
             // Redirect to Payment/create
             header('Location: /Payment/create');
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
        $paymentModel = new PaymentModel();
        $bookingModel = new BookingModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Delete related payments
            $paymentModel->deleteByBookingID($bookingID);

            // Delete the booking
            $bookingModel->delete($bookingID);

            unset($_SESSION['bookingID']);
            header('Location:/');
        } else {
            $booking = $bookingModel->getForBooking($bookingID);
            $this->view('Booking/delete', ['booking' => $booking]);
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
        $bookingModel = new \app\models\Booking();
        $detailedBooking = $bookingModel->getForBooking($bookingID);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $detailedBooking->bookingDate = $_POST['bookingDate'];
            $detailedBooking->bookingTime = $_POST['bookingTime'];
            $detailedBooking->frequency = $_POST['Frequency'];
            $detailedBooking->status = 'Scheduled';
            $detailedBooking->message = $_POST['frequencyMessage'] ?? null ;
            $detailedBooking->update();

            header('Location: /Booking/complete/' . $detailedBooking->bookingID);
            exit;
        } else {
            $this->view('Booking/modify', ['data' => $detailedBooking]);  // Pass booking data to view
        }
    }
}