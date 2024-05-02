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
            $booking->insert();
            $_SESSION['bookingID']=$booking->bookingID;
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
         
        $booking = new \app\models\Booking();
        $booking = $booking->getForBooking($_SESSION['bookingID']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           

           
                $booking->delete();
                unset($_SESSION['bookingID']);
                header('Location:/Home/index');
           
        } else {
            
            $this->view('Booking/delete', $booking);
        }
    }

    // Additional controller methods for other actions can be added here
    public function getAll()
    {
        try {
            // Instantiate Booking model
            $booking = new \app\models\Booking();

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

    public function complete() {
        $bookingModel = new \app\models\Booking();
        $detailedBooking = $bookingModel->getForBooking($_SESSION['bookingID']);

        // Render the profile view with customer data.
        $this->view('Booking/complete', $detailedBooking);
    }

    public function modify()
	{
      
        $bookingModel = new \app\models\Booking();
        $detailedBooking = $bookingModel->getForBooking($_SESSION['bookingID']);

    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $detailedBooking->bookingDate = $_POST['bookingDate']; 
            $detailedBooking->bookingTime = $_POST['bookingTime']; 
            $detailedBooking->frequency = $_POST['Frequency'];
            $detailedBooking->status = 'Scheduled';
          
    
    
            $detailedBooking->update();
            header('Location: /Booking/complete'); // Redirect to a profile page or other appropriate location
            exit;
        } else {
            $this->view('Booking/modify',$detailedBooking);
        }
	}


}

?>