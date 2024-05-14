<?php

namespace app\controllers;

class Admin extends \app\core\Controller {
    public function index() {
        $bookingModel = new \app\models\Booking();
    
        $allBookings = $bookingModel->getAllBookingsAndCustomer();
    
        if (!empty($_GET)) {
            $allBookings = array_filter($allBookings, function($booking) {
                return (empty($_GET['firstName']) || stripos($booking['firstName'], $_GET['firstName']) !== false)
                    && (empty($_GET['lastName']) || stripos($booking['lastName'], $_GET['lastName']) !== false)
                    && (empty($_GET['email']) || stripos($booking['Email'], $_GET['email']) !== false)
                    && (empty($_GET['date']) || $booking['bookingDate'] == $_GET['date'])
                    && (empty($_GET['category']) || $booking['Category'] == $_GET['category'])
                    && (empty($_GET['frequency']) || $booking['Frequency'] == $_GET['frequency'])
                    && (empty($_GET['status']) || $booking['Status'] == $_GET['status'])
                    && (empty($_GET['message']) || $booking['message'] == $_GET['message']);
            });
        }
    
        $this->view('Admin/index', $allBookings);
    }
    

    public function modify($bookingID)
    {
        $bookingModel = new \app\models\Booking();
        $detailedBooking = $bookingModel->getForBooking($bookingID);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $detailedBooking->bookingDate = $_POST['bookingDate'];
            $detailedBooking->bookingTime = $_POST['bookingTime'];
            $detailedBooking->frequency = $_POST['Frequency'];
            $detailedBooking->status = $_POST['Status'];
            $detailedBooking->update();

            header('Location: /Admin/index'); // Redirect to a profile page or other appropriate location
            exit;
        } else {
            $this->view('Admin/modify', ['data' => $detailedBooking]);  // Pass booking data to view
        }
    }

    public function login()
    {
        //show the login form and log the user in
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //log the user in... if the password is right
            //get the user from the database
            $Email = $_POST['Email'];
            
            //check the password against the hash
            $password = $_POST['password'];
            if ($Email == "admin@gmail.com" && $password == "password1234" ) {
                //remember that this is the user logging in...
                

                header('location:/Admin/');
            } else {
                header('location:/Admin/login');
            }
        } else {
            $this->view('Admin/login');
        }
    }

    public function delete($bookingID)
    {
        $bookingModel = new \app\models\Booking();
        $booking = $bookingModel->getForBooking($bookingID);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $booking->delete();
            unset($_SESSION['bookingID']);
            header('Location:/Admin/');

        } else {
            $this->view('Admin/delete', ['data' => $booking]);
        }
    }
}
