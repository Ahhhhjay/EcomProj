<?php

namespace app\controllers;

use app\models\Promotions;
use app\core\Controller;

/**
 * PromotionsController manages actions related to promotional operations.
 */
class PromotionsController extends Controller
{
    /**
     * Creates a new promotion from POST data.
     */
    public function create()
    {
        $promotion = new Promotions();
        $promotion->promotionID = $_POST['promotionID'] ?? null;
        $promotion->description = $_POST['description'];
        $promotion->discountRate = $_POST['discountRate'];
        $promotion->validFrom = $_POST['validFrom'];
        $promotion->validTo = $_POST['validTo'];

        try {
            $promotion->insert();
            // Redirect to a success page or send a success response
            header('Location: /promotion/success');
        } catch (\Exception $e) {
            // Handle errors and potentially log them, redirect to an error page
            header('Location: /promotion/error');
        }
    }

    /**
     * Deletes an existing promotion.
     */
    public function delete()
    {
        $promotionID = $_POST['promotionID'] ?? null;
        if ($promotionID) {
            $promotion = new Promotions();
            $promotion->promotionID = $promotionID;

            try {
                $promotion->delete();
                // Redirect or respond after successful deletion
                header('Location: /promotion/deleted');
            } catch (\Exception $e) {
                // Error handling
                header('Location: /promotion/error');
            }
        } else {
            // Error handling for no promotion ID provided
            header('Location: /promotion/error');
        }
    }

    // Additional methods for other operations like updating, retrieving, or listing promotions can be added here
}

?>
