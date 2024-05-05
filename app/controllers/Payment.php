<?php

namespace app\controllers;

class Payment extends app\core\Controller
{
    /**
     * Creates a new payment from POST data.
     */
    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $payment = new \app\models\Payment();
        $payment->customerID = $_POST['customerID'];
        $payment->cardNumber = $_POST['cardNumber'];
        $payment->expirationDate = $_POST['expirationDate'];
        $payment->billingAddress = $_POST['billingAddress'];
         $payment->insert();
            // Redirect to a success page or send a success response
            header('Location: /Payment/success');
        }else{
            $this->view('');
        }
       
      
    }

    /**
     * Deletes an existing payment.
     */
    public function delete()
    {
        $paymentID = $_POST['paymentID'] ?? null;
        if ($paymentID) {
            $payment = new \app\models\Payment();
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
