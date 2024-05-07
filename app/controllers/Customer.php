<?php

namespace app\controllers;

/**
 * CustomerController manages actions related to customer operations.
 */
class Customer extends \app\core\Controller
{
    /**
     * Creates a new customer from POST data.
     */


    public function index()
    {
        //  $customer = new \app\models\Customer();
        //  $customer = $customer->getById($_SESSION['customerID']);
        if (!isset($_SESSION['customerID'])) {
            // Redirect to login page if not logged in.
            header('Location: /Customer/login');
            exit;
        }

        // Get customer data from the model.
        $customerModel = new \app\models\Customer();
        $customer = $customerModel->getById($_SESSION['customerID']);

        if (!$customer) {
            // If no customer is found, handle the error.
            // This could redirect to an error page or handle differently.
            header('Location: /Customer/error'); // Assuming there's an error route.
            exit;
        }

        // Get bookings for the customer
        $bookingModel = new \app\models\Booking();
        $bookings = $bookingModel->getAllForCustomer($_SESSION['customerID']);

        // Render the profile view with customer data.
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

            header('location:/Customer/login');
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

                header('location:/Home/index');
            } else {
                header('location:/Customer/login');
            }
        } else {
            $this->view('Customer/login');
        }
    }

    public function logout(){
		//session_destroy();
		//$_SESSION['user_id'] = null;

		session_destroy();

		header('location:/Home/index');
	}

    /**
     * Deletes an existing customer.
     */
    public function delete()
    {

        $customer = new \app\models\Customer();
        $customer = $customer->getById($_SESSION['customerID']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            $customer->delete();
            unset($_SESSION['customerID']);
            header('Location:/Customer/index');

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
            header('Location: /Customer/index'); // Redirect to a profile page or other appropriate location
            exit;
        } else {
            $this->view('Customer/update', $customer);
        }
    }

}
