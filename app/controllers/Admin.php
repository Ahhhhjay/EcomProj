<?php

namespace app\controllers;

class Admin extends \app\core\Controller {
    public function index() {
        $bookingModel = new \app\models\Booking();
        $allBookings = $bookingModel->getAllBookingsAndEmail();
        $this->view('Admin/index', ['bookings' => $allBookings]);
    }

    public function modify()
    {
        $bookingID = $_GET['bookingID'] ?? null;  // Get bookingID from URL

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
                

                header('location:/Admin/index');
            } else {
                header('location:/Admin/login');
            }
        } else {
            $this->view('Admin/login');
        }
    }

    public function delete()
    {
        $bookingID = $_GET['bookingID'] ?? null;

        $bookingModel = new \app\models\Booking();
        $booking = $bookingModel->getForBooking($bookingID);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $booking->delete();
            unset($_SESSION['bookingID']);
            header('Location:/Admin/index');

        } else {
            $this->view('Admin/delete', ['data' => $booking]);
        }
    }
}
