<?php

namespace app\controllers;

/**
 * CustomerController manages actions related to customer operations.
 */
class Customer extends \app\core\Controller
{
    public function index()
    {
        if (!isset($_SESSION['customerID'])) {
            header('Location: /Customer/login');
            exit;
        }

        $customerModel = new \app\models\Customer();
        $customer = $customerModel->getById($_SESSION['customerID']);

        $bookingModel = new \app\models\Booking();
        $bookings = $bookingModel->getAllForCustomer($_SESSION['customerID']);

        $this->view('Customer/index', ['customer' => $customer, 'bookings' => $bookings]);
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer = new \app\models\Customer();
            
            $customer->firstName = $_POST['firstName'];
            $customer->lastName = $_POST['lastName'];
            $customer->Email = $_POST['Email'];
            $customer->contactNumber = $_POST['contactNumber'];
            $customer->passwordHash = password_hash($_POST['passwordHash'], PASSWORD_DEFAULT);
            $customer->Address = $_POST['Address'];

            $customer->insert();

            header('Location:/Customer/login');
        } else {
            $this->view('Customer/register');
        }
    }

    public function login()
    {
        //show the login form and log the user in
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //log the user in... if the password is right
            //get the user from the database
            $Email = $_POST['Email'];
            $customer = new \app\models\Customer();
            $customer = $customer->get($Email);
            //check the password against the hash
            $passwordHash = $_POST['passwordHash'];
            if ($Email && password_verify($passwordHash, $customer->passwordHash)) {
                //remember that this is the user logging in...
                $_SESSION['customerID'] = $customer->customerID;

                header('Location:/');
            } else {
                header('Location:/Customer/login');
            }
        } else {
            $this->view('Customer/login');
        }
    }

    public function logout(){
		session_destroy();

		header('Location:/');
	}

    public function delete()
    {

        $customer = new \app\models\Customer();
        $customer = $customer->getById($_SESSION['customerID']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer->delete();
            unset($_SESSION['customerID']);
            header('Location:/');
        } else {
            $this->view('Customer/delete', $customer);
        }
    }


    // Additional controller methods can be added here for other operations like updating, retrieving, or listing customers
    public function update()
    {
        if (!isset($_SESSION['customerID'])) {
            header('Location: /Customer/login');
            exit;
        }

        $customerModel = new \app\models\Customer();
        $customer = $customerModel->getById($_SESSION['customerID']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer->firstName = $_POST['firstName'];
            $customer->lastName = $_POST['lastName'];
            $customer->Email = $_POST['Email'];
            $customer->contactNumber = $_POST['contactNumber'];
            $customer->Address = $_POST['Address'];

            // Update the password only if a new one was provided
            if (!empty($_POST['passwordHash'])) {
                $customer->passwordHash = password_hash($_POST['passwordHash'], PASSWORD_DEFAULT);
            }

            $customer->update();
            header('Location: /Customer/'); // Redirect to a profile page or other appropriate Location
            exit;
        } else {
            $this->view('Customer/update', $customer);
        }
    }

}
