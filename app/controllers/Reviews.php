<?php

namespace app\controllers;




/**
 * ReviewsController manages actions related to customer reviews.
 */
class Reviews extends app\core\Controller
{
    /**
     * Creates a new review from POST data.
     */
    public function create()
    {
        $review =  new \app\models\Reviews();
        $review->bookingID = $_POST['bookingID'];
        $review->customerID = $_POST['customerID'];
        $review->rating = $_POST['rating'];
        $review->text = $_POST['text'];
        $review->datePosted = $_POST['datePosted'];

        try {
            $review->insert();
            // Redirect to a success page or send a success response
            header('Location: /review/success');
        } catch (\Exception $e) {
            // Handle errors and potentially log them, redirect to an error page
            header('Location: /review/error');
        }
    }

    /**
     * Deletes an existing review.
     */
    public function delete()
    {
        $reviewID = $_POST['reviewID'] ?? null;
        if ($reviewID) {
            $review = new \app\models\Reviews();
            $review->reviewID = $reviewID;

            try {
                $review->delete();
                // Redirect or respond after successful deletion
                header('Location: /review/deleted');
            } catch (\Exception $e) {
                // Error handling
                header('Location: /review/error');
            }
        } else {
            // Error handling for no review ID provided
            header('Location: /review/error');
        }
    }

    // Additional methods for other operations like updating or listing reviews could be added here
}

?>
