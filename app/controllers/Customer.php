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

    /**
     * Deletes an existing customer.
     */
    public function delete()
    {
        $customerID = $_POST['customerID'] ?? null;
        if ($customerID) {
            $customer = new \app\models\Customer();
            $customer->customerID = $customerID;

            try {
                $customer->delete();
                // Redirect or respond after successful deletion
                header('Location: /customer/deleted');
            } catch (\Exception $e) {
                // Error handling
                header('Location: /customer/error');
            }
        } else {
            // Error handling for no customer ID provided
            header('Location: /customer/error');
        }
    }

    // Additional controller methods can be added here for other operations like updating, retrieving, or listing customers
}
