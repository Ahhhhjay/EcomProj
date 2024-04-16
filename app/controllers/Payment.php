<?php

namespace app\controllers;

use app\models\Payment;
use app\core\Controller;

/**
 * PaymentController manages actions related to payment operations.
 */
class PaymentController extends Controller
{
    /**
     * Creates a new payment from POST data.
     */
    public function create()
    {
        $payment = new Payment();
        $payment->paymentID = $_POST['paymentID'] ?? null;
        $payment->customerID = $_POST['customerID'];
        $payment->cardNumber = $_POST['cardNumber'];
        $payment->expirationDate = $_POST['expirationDate'];
        $payment->billingAddress = $_POST['billingAddress'];

        try {
            $payment->insert();
            // Redirect to a success page or send a success response
            header('Location: /payment/success');
        } catch (\Exception $e) {
            // Handle errors and potentially log them, redirect to an error page
            header('Location: /payment/error');
        }
    }

    /**
     * Deletes an existing payment.
     */
    public function delete()
    {
        $paymentID = $_POST['paymentID'] ?? null;
        if ($paymentID) {
            $payment = new Payment();
            $payment->paymentID = $paymentID;

            try {
                $payment->delete();
                // Redirect or respond after successful deletion
                header('Location: /payment/deleted');
            } catch (\Exception $e) {
                // Error handling
                header('Location: /payment/error');
            }
        } else {
            // Error handling for no payment ID provided
            header('Location: /payment/error');
        }
    }

    // Additional controller methods for other operations like updating, retrieving, or listing payments
}

?>
