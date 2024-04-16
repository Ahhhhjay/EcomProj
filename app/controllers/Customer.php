<?php

namespace app\controllers;

use app\models\Customer;
use app\core\Controller;

/**
 * CustomerController manages actions related to customer operations.
 */
class CustomerController extends Controller
{
    /**
     * Creates a new customer from POST data.
     */
    public function create()
    {
        $customer = new Customer();
        $customer->customerID = $_POST['customerID'] ?? null;
        $customer->firstName = $_POST['firstName'];
        $customer->lastName = $_POST['lastName'];
        $customer->Email = $_POST['Email'];
        $customer->contactNumber = $_POST['contactNumber'];
        $customer->passwordHash = $_POST['passwordHash'];
        $customer->Address = $_POST['Address'];

        try {
            $customer->insert();
            // Redirect to a success page or send a success response
            header('Location: /customer/success');
        } catch (\Exception $e) {
            // Handle errors and potentially log them, redirect to an error page
            header('Location: /customer/error');
        }
    }

    /**
     * Deletes an existing customer.
     */
    public function delete()
    {
        $customerID = $_POST['customerID'] ?? null;
        if ($customerID) {
            $customer = new Customer();
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

?>
