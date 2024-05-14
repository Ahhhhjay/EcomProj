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

    // Deletes an existing booking
    public function delete($bookingID)
    {
        $bookingModel = new \app\models\Booking();
        $booking = $bookingModel->getForBooking($bookingID);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $booking->delete();
            unset($_SESSION['bookingID']);
            header('Location:/');
        } else {
            $this->view('Booking/delete', $booking);
        }
    }

    // Display booking completion details
    public function complete($bookingID)
    {
        $bookingModel = new \app\models\Booking();
        $detailedBooking = $bookingModel->getForBooking($bookingID);
        $this->view('Booking/complete', $detailedBooking);
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