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
            exit();
        }

        $customerModel = new \app\models\Customer();
        $customer = $customerModel->getById($_SESSION['customerID']);

        $bookingModel = new \app\models\Booking();
        $bookings = $bookingModel->getAllForCustomer($_SESSION['customerID']);

        // Controller logic to fetch and pass to view
        $paymentModel = new \app\models\Payment();
        $payments = $paymentModel->getPaymentsByCustomer($_SESSION['customerID']);

        foreach ($bookings as $booking) {
            $booking->totalPrice = isset($payments[$booking->bookingID]) ? $payments[$booking->bookingID]->total_price : '0.00';
        }

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Email = $_POST['Email'];
            $passwordHash = $_POST['passwordHash'];

            $customer = new \app\models\Customer();
            $customer = $customer->get($Email);

            if ($Email == "admin@gmail.com" && $passwordHash == "admin") {
                header('location:/Admin/');
            } else if ($Email && password_verify($passwordHash, $customer->passwordHash)) {
                $_SESSION['customerID'] = $customer->customerID;

                header('Location:/');

            } else {
                header('Location:/Customer/login');
            }
        } else {
            $this->view('Customer/login');
        }
    }

    public function logout()
    {
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

    public function adminIndex()
    {
        $customerModel = new \app\models\Customer();

        $allCustomers = $customerModel->getAll();

        if (!empty($_GET)) {
            $allCustomers = array_filter($allCustomers, function ($customer) {
                return (empty ($_GET['firstName']) || stripos($customer['firstName'], $_GET['firstName']) !== false)
                    && (empty ($_GET['lastName']) || stripos($customer['lastName'], $_GET['lastName']) !== false)
                    && (empty ($_GET['email']) || stripos($customer['Email'], $_GET['email']) !== false)
                    && (empty ($_GET['contactNumber']) || stripos($customer['contactNumber'], $_GET['contactNumber']) !== false);
            });
        }

        $this->view('Customer/adminIndex', $allCustomers);
    }

}
