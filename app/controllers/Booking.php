<?php

namespace app\controllers;

use app\models\Booking;
use app\core\Controller;

/**
 * BookingController handles the web requests related to bookings.
 */
class BookingController extends Controller
{
    /**
     * Creates a new booking with provided data.
     */
    public function create()
    {
        $booking = new Booking();
        $booking->bookingID = $_POST['bookingID'] ?? null;
        $booking->customerID = $_POST['customerID'];
        $booking->serviceID = $_POST['serviceID'];
        $booking->bookingDate = $_POST['bookingDate'];
        $booking->bookingTime = $_POST['bookingTime'];
        $booking->status = $_POST['status'];
        $booking->frequency = $_POST['frequency'] ?? null;

        try {
            $booking->insert();
            // Redirect to a success page or send a success response
            header('Location: /booking/success');
        } catch (\Exception $e) {
            // Handle errors, possibly log them and show an error message to the user
            header('Location: /booking/error');
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
}

?>
