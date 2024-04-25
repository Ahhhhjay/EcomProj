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
            if (empty($_SESSION['serviceID'])) {
                die('Service ID is required for booking.');
            }
            
            $booking = new \app\models\Booking();
            $booking->customerID = $_SESSION['customerID'];
            $booking->serviceID = $_SESSION['serviceID'];
            $booking->bookingDate = $_POST['bookingDate'];
            $booking->bookingTime = $_POST['bookingTime'];
            $booking->status = "Scheduled";
            $booking->frequency = $_POST['frequency'] ?? null;

            $booking->insert();
            header('location:/Booking/complete');
        } else {
            $this->view('Booking/create');
        }
    }

    /**
     * Deletes an existing booking.
     */
    public function delete()
    {
        $bookingID = $_POST['bookingID'] ?? null;
        if ($bookingID) {
            $booking = new Booking();
            $booking->bookingID = $bookingID;

            try {
                $booking->delete();
                // Redirect or respond after deletion
                header('Location: /booking/deleted');
            } catch (\Exception $e) {
                // Error handling
                header('Location: /booking/error');
            }
        } else {
            // Error handling for no booking ID provided
            header('Location: /booking/error');
        }
    }

    // Additional controller methods for other actions can be added here
    public function getAll()
    {
        try {
            // Instantiate Booking model
            $booking = new Booking();

            // Call method to get all bookings
            $allBookings = $booking->getAllBookings();

            // Here, you can do something with $allBookings, like passing it to a view for display
            // Or you can directly send a JSON response, etc.

            // For example, if you want to pass it to a view:
            $this->view('booking/all', ['bookings' => $allBookings]);
        } catch (\Exception $e) {
            // Error handling
            header('Location: /booking/error');
        }
    }
}

?>