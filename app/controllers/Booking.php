<?php

namespace app\controllers;


/**
 * BookingController handles the web requests related to bookings.
 */
class Booking extends app\core\Controller
{
    /**
     * Creates a new booking with provided data.
     */
    public function create()
    {
        $booking = new Booking();
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
