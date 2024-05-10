<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

         /**
     * @Given I am on :arg1
     */
       /**
     * @When I select :arg1 from the property type options
     */
    public function iSelectFromThePropertyTypeOptions($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select :arg1 from the property type options` is not defined");
    }

   /**
    * @When I enter :arg1 into the square footage field
    */
    public function iEnterIntoTheSquareFootageField($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I enter :arg1 into the square footage field` is not defined");
    }

   /**
    * @When I click the :arg1 button
    */
    public function iClickTheButton($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I click the :arg1 button` is not defined");
    }

   /**
    * @Then I should see an estimated price displayed for cleaning a small apartment
    */
    public function iShouldSeeAnEstimatedPriceDisplayedForCleaningASmallApartment()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see an estimated price displayed for cleaning a small apartment` is not defined");
    }

   /**
    * @Then the estimated price should be based on the average cleaning rates for residential for :arg1 square feet
    */
    public function theEstimatedPriceShouldBeBasedOnTheAverageCleaningRatesForResidentialForSquareFeet($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the estimated price should be based on the average cleaning rates for residential for :arg1 square feet` is not defined");
    }

   /**
    * @Given I am logged in as a returning customer
    */
    public function iAmLoggedInAsAReturningCustomer()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am logged in as a returning customer` is not defined");
    }

   /**
    * @When I navigate to the booking page
    */
    public function iNavigateToTheBookingPage()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I navigate to the booking page` is not defined");
    }

   /**
    * @When I select :arg1 from the appointment frequency options
    */
    public function iSelectFromTheAppointmentFrequencyOptions($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select :arg1 from the appointment frequency options` is not defined");
    }

   /**
    * @When I choose :arg1 from the recurrence interval dropdown
    */
    public function iChooseFromTheRecurrenceIntervalDropdown($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I choose :arg1 from the recurrence interval dropdown` is not defined");
    }

   /**
    * @When I select my Sunday at :num1::num2:num2 PM for the initial cleaning
    */
    public function iSelectMySundayAtPMForTheInitialCleaning($num1, $num2, $num3)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select my Sunday at :num1::num2:num2 PM for the initial cleaning` is not defined");
    }

   /**
    * @Then a confirmation message should be displayed for the recurring cleaning appointments
    */
    public function aConfirmationMessageShouldBeDisplayedForTheRecurringCleaningAppointments()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `a confirmation message should be displayed for the recurring cleaning appointments` is not defined");
    }

   /**
    * @Then the upcoming cleaning appointments should be scheduled on a bi-weekly basis on Sunday :num1::num2:num2 PM
    */
    public function theUpcomingCleaningAppointmentsShouldBeScheduledOnABiweeklyBasisOnSundayPM($num1, $num2, $num3)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the upcoming cleaning appointments should be scheduled on a bi-weekly basis on Sunday :num1::num2:num2 PM` is not defined");
    }

   /**
    * @Given I am on the booking page
    */
    public function iAmOnTheBookingPage()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on the booking page` is not defined");
    }

   /**
    * @When I expand the :arg1 section
    */
    public function iExpandTheSection($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I expand the :arg1 section` is not defined");
    }

   /**
    * @When I select specific rooms or areas I want cleaned (e:num1g:num1, kitchen, bathroom)
    */
    public function iSelectSpecificRoomsOrAreasIWantCleanedegKitchenBathroom($num1, $num2)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select specific rooms or areas I want cleaned (e:num1g:num1, kitchen, bathroom)` is not defined");
    }

   /**
    * @When I choose any additional services I desire (e:num1g:num1, oven cleaning)
    */
    public function iChooseAnyAdditionalServicesIDesireegOvenCleaning($num1, $num2)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I choose any additional services I desire (e:num1g:num1, oven cleaning)` is not defined");
    }

   /**
    * @Then the total price of the cleaning service should be automatically updated
    */
    public function theTotalPriceOfTheCleaningServiceShouldBeAutomaticallyUpdated()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the total price of the cleaning service should be automatically updated` is not defined");
    }

   /**
    * @Then only the selected areas and services should be included in the cleaning job description
    */
    public function onlyTheSelectedAreasAndServicesShouldBeIncludedInTheCleaningJobDescription()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `only the selected areas and services should be included in the cleaning job description` is not defined");
    }

   /**
    * @Given I am a logged-in customer who has used multiple payment methods for past bookings
    */
    public function iAmALoggedinCustomerWhoHasUsedMultiplePaymentMethodsForPastBookings()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am a logged-in customer who has used multiple payment methods for past bookings` is not defined");
    }

   /**
    * @When I proceed to checkout for a new booking
    */
    public function iProceedToCheckoutForANewBooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I proceed to checkout for a new booking` is not defined");
    }

   /**
    * @Then I should be presented with a dropdown list of my saved payment methods
    */
    public function iShouldBePresentedWithADropdownListOfMySavedPaymentMethods()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be presented with a dropdown list of my saved payment methods` is not defined");
    }

   /**
    * @Then I can select any one of my previously used payment methods for the current transaction
    */
    public function iCanSelectAnyOneOfMyPreviouslyUsedPaymentMethodsForTheCurrentTransaction()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I can select any one of my previously used payment methods for the current transaction` is not defined");
    }

   /**
    * @Given I am a logged-in customer with previously saved payment methods
    */
    public function iAmALoggedinCustomerWithPreviouslySavedPaymentMethods()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am a logged-in customer with previously saved payment methods` is not defined");
    }

   /**
    * @When I navigate to the :arg1 section
    */
    public function iNavigateToTheSection($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I navigate to the :arg1 section` is not defined");
    }

   /**
    * @When I select :arg1
    */
    public function iSelect($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select :arg1` is not defined");
    }

   /**
    * @Then I should see a list of all my saved payment methods
    */
    public function iShouldSeeAListOfAllMySavedPaymentMethods()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see a list of all my saved payment methods` is not defined");
    }

   /**
    * @Then for each payment method, options to edit or delete it
    */
    public function forEachPaymentMethodOptionsToEditOrDeleteIt()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `for each payment method, options to edit or delete it` is not defined");
    }

   /**
    * @Given I am viewing my list of saved payment methods
    */
    public function iAmViewingMyListOfSavedPaymentMethods()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am viewing my list of saved payment methods` is not defined");
    }

   /**
    * @When I choose to edit a payment method
    */
    public function iChooseToEditAPaymentMethod()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I choose to edit a payment method` is not defined");
    }

   /**
    * @Then I should be able to update the payment method's details such as the card number, expiration date, and billing address
    */
    public function iShouldBeAbleToUpdateThePaymentMethodsDetailsSuchAsTheCardNumberExpirationDateAndBillingAddress()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to update the payment method's details such as the card number, expiration date, and billing address` is not defined");
    }

   /**
    * @Then I should see an option to save my changes
    */
    public function iShouldSeeAnOptionToSaveMyChanges()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see an option to save my changes` is not defined");
    }

   /**
    * @When I save my changes
    */
    public function iSaveMyChanges()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I save my changes` is not defined");
    }

   /**
    * @Then the payment method should be updated with the new details
    */
    public function thePaymentMethodShouldBeUpdatedWithTheNewDetails()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the payment method should be updated with the new details` is not defined");
    }

   /**
    * @When I choose to delete a payment method
    */
    public function iChooseToDeleteAPaymentMethod()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I choose to delete a payment method` is not defined");
    }

   /**
    * @Then I should receive a prompt to confirm the deletion to prevent accidental removal
    */
    public function iShouldReceiveAPromptToConfirmTheDeletionToPreventAccidentalRemoval()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should receive a prompt to confirm the deletion to prevent accidental removal` is not defined");
    }

   /**
    * @When I confirm the deletion
    */
    public function iConfirmTheDeletion()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I confirm the deletion` is not defined");
    }

   /**
    * @Then the payment method should be permanently removed from my account
    */
    public function thePaymentMethodShouldBePermanentlyRemovedFromMyAccount()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the payment method should be permanently removed from my account` is not defined");
    }

   /**
    * @Given I am a logged-in customer
    */
    public function iAmALoggedinCustomer()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am a logged-in customer` is not defined");
    }

   /**
    * @When I complete a booking for a cleaning service
    */
    public function iCompleteABookingForACleaningService()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I complete a booking for a cleaning service` is not defined");
    }

   /**
    * @Then I should be redirected to a booking confirmation page
    */
    public function iShouldBeRedirectedToABookingConfirmationPage()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be redirected to a booking confirmation page` is not defined");
    }

   /**
    * @Then I should see the date and time of my booking
    */
    public function iShouldSeeTheDateAndTimeOfMyBooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see the date and time of my booking` is not defined");
    }

   /**
    * @Then I should see the list of services I have booked
    */
    public function iShouldSeeTheListOfServicesIHaveBooked()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see the list of services I have booked` is not defined");
    }

   /**
    * @Then I should see the total cost of my booking
    */
    public function iShouldSeeTheTotalCostOfMyBooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see the total cost of my booking` is not defined");
    }

   /**
    * @Then I should see the location where the service will be provided
    */
    public function iShouldSeeTheLocationWhereTheServiceWillBeProvided()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see the location where the service will be provided` is not defined");
    }

   /**
    * @Then I should have options to print, save, or email the confirmation
    */
    public function iShouldHaveOptionsToPrintSaveOrEmailTheConfirmation()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should have options to print, save, or email the confirmation` is not defined");
    }

   /**
    * @Given I am on the cleaning service website homepage
    */
    public function iAmOnTheCleaningServiceWebsiteHomepage()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on the cleaning service website homepage` is not defined");
    }

   /**
    * @When I click on the :arg1 link
    */
    public function iClickOnTheLink($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I click on the :arg1 link` is not defined");
    }

   /**
    * @Then I should see a dedicated page with detailed information about the company
    */
    public function iShouldSeeADedicatedPageWithDetailedInformationAboutTheCompany()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see a dedicated page with detailed information about the company` is not defined");
    }

   /**
    * @Then this page should include sections on cleaning procedures, eco-friendly practices (if applicable), and insurance policies
    */
    public function thisPageShouldIncludeSectionsOnCleaningProceduresEcofriendlyPracticesifApplicableAndInsurancePolicies()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `this page should include sections on cleaning procedures, eco-friendly practices (if applicable), and insurance policies` is not defined");
    }

   /**
    * @Given I have an existing booking more than :num1 days from now
    */
    public function iHaveAnExistingBookingMoreThanDaysFromNow($num1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I have an existing booking more than :num1 days from now` is not defined");
    }

   /**
    * @When I choose to reschedule this booking
    */
    public function iChooseToRescheduleThisBooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I choose to reschedule this booking` is not defined");
    }

   /**
    * @When I select a new available time and date more than :num1 days in the future
    */
    public function iSelectANewAvailableTimeAndDateMoreThanDaysInTheFuture($num1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select a new available time and date more than :num1 days in the future` is not defined");
    }

   /**
    * @Then my booking should be updated to the new time and date
    */
    public function myBookingShouldBeUpdatedToTheNewTimeAndDate()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `my booking should be updated to the new time and date` is not defined");
    }

   /**
    * @Then I should receive a confirmation of the rescheduling
    */
    public function iShouldReceiveAConfirmationOfTheRescheduling()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should receive a confirmation of the rescheduling` is not defined");
    }

   /**
    * @Given I have an existing booking less than :num1 days from now
    */
    public function iHaveAnExistingBookingLessThanDaysFromNow($num1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I have an existing booking less than :num1 days from now` is not defined");
    }

   /**
    * @When I attempt to reschedule this booking
    */
    public function iAttemptToRescheduleThisBooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I attempt to reschedule this booking` is not defined");
    }

   /**
    * @Then I should receive a message indicating that rescheduling is not possible
    */
    public function iShouldReceiveAMessageIndicatingThatReschedulingIsNotPossible()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should receive a message indicating that rescheduling is not possible` is not defined");
    }

   /**
    * @Then I should be advised to contact customer service for further assistance
    */
    public function iShouldBeAdvisedToContactCustomerServiceForFurtherAssistance()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be advised to contact customer service for further assistance` is not defined");
    }

   /**
    * @Then I should be presented with a calendar showing available times and dates
    */
    public function iShouldBePresentedWithACalendarShowingAvailableTimesAndDates()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be presented with a calendar showing available times and dates` is not defined");
    }

   /**
    * @Then only times and dates more than :num1 days in the future should be selectable
    */
    public function onlyTimesAndDatesMoreThanDaysInTheFutureShouldBeSelectable($num1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `only times and dates more than :num1 days in the future should be selectable` is not defined");
    }

   /**
    * @Given I am logged in as a customer
    */
    public function iAmLoggedInAsACustomer()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am logged in as a customer` is not defined");
    }

   /**
    * @When I select an upcoming cleaning appointment
    */
    public function iSelectAnUpcomingCleaningAppointment()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select an upcoming cleaning appointment` is not defined");
    }

   /**
    * @When I add :arg1 to :arg2
    */
    public function iAddTo($arg1, $arg2)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I add :arg1 to :arg2` is not defined");
    }

   /**
    * @When I click :arg1
    */
    public function iClick($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I click :arg1` is not defined");
    }

   /**
    * @Then I see :arg1 in :arg2
    */
    public function iSeeIn($arg1, $arg2)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I see :arg1 in :arg2` is not defined");
    }

   /**
    * @Then I see :arg1 in the :arg2 section
    */
    public function iSeeInTheSection($arg1, $arg2)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I see :arg1 in the :arg2 section` is not defined");
    }

   /**
    * @Given I have an existing booking
    */
    public function iHaveAnExistingBooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I have an existing booking` is not defined");
    }

   /**
    * @When I navigate to my booking history
    */
    public function iNavigateToMyBookingHistory()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I navigate to my booking history` is not defined");
    }

   /**
    * @When I select the option to delete a specific booking
    */
    public function iSelectTheOptionToDeleteASpecificBooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select the option to delete a specific booking` is not defined");
    }

   /**
    * @Then I should receive a prompt to confirm the deletion
    */
    public function iShouldReceiveAPromptToConfirmTheDeletion()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should receive a prompt to confirm the deletion` is not defined");
    }

   /**
    * @Then the selected booking should be removed from my booking history
    */
    public function theSelectedBookingShouldBeRemovedFromMyBookingHistory()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the selected booking should be removed from my booking history` is not defined");
    }

   /**
    * @Then I should receive a confirmation message that the booking has been successfully deleted
    */
    public function iShouldReceiveAConfirmationMessageThatTheBookingHasBeenSuccessfullyDeleted()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should receive a confirmation message that the booking has been successfully deleted` is not defined");
    }

   /**
    * @When I cancel the deletion
    */
    public function iCancelTheDeletion()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I cancel the deletion` is not defined");
    }

   /**
    * @Then the booking should remain in my booking history
    */
    public function theBookingShouldRemainInMyBookingHistory()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the booking should remain in my booking history` is not defined");
    }

   /**
    * @Then no changes should be made to my bookings
    */
    public function noChangesShouldBeMadeToMyBookings()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `no changes should be made to my bookings` is not defined");
    }

   /**
    * @Given I have completed a cleaning service appointment
    */
    public function iHaveCompletedACleaningServiceAppointment()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I have completed a cleaning service appointment` is not defined");
    }

   /**
    * @When I receive a notification to leave a review
    */
    public function iReceiveANotificationToLeaveAReview()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I receive a notification to leave a review` is not defined");
    }

   /**
    * @When I click on the link to submit a review
    */
    public function iClickOnTheLinkToSubmitAReview()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I click on the link to submit a review` is not defined");
    }

   /**
    * @Then I should be able to provide a star rating and write a detailed review of the cleaning service
    */
    public function iShouldBeAbleToProvideAStarRatingAndWriteADetailedReviewOfTheCleaningService()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to provide a star rating and write a detailed review of the cleaning service` is not defined");
    }

   /**
    * @Then the review should be submitted and displayed on the company's profile page (after moderation if applicable)
    */
    public function theReviewShouldBeSubmittedAndDisplayedOnTheCompanysProfilePageafterModerationIfApplicable()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the review should be submitted and displayed on the company's profile page (after moderation if applicable)` is not defined");
    }

   /**
    * @Given I have previously submitted a review and rating for a cleaning service
    */
    public function iHavePreviouslySubmittedAReviewAndRatingForACleaningService()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I have previously submitted a review and rating for a cleaning service` is not defined");
    }

   /**
    * @When I navigate to my submitted reviews
    */
    public function iNavigateToMySubmittedReviews()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I navigate to my submitted reviews` is not defined");
    }

   /**
    * @When I select the option to modify a specific review and rating
    */
    public function iSelectTheOptionToModifyASpecificReviewAndRating()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select the option to modify a specific review and rating` is not defined");
    }

   /**
    * @Then I should be able to edit the text of my review
    */
    public function iShouldBeAbleToEditTheTextOfMyReview()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to edit the text of my review` is not defined");
    }

   /**
    * @Then I should be able to change the star rating
    */
    public function iShouldBeAbleToChangeTheStarRating()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to change the star rating` is not defined");
    }

   /**
    * @Then my review and rating should be updated immediately
    */
    public function myReviewAndRatingShouldBeUpdatedImmediately()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `my review and rating should be updated immediately` is not defined");
    }

   /**
    * @When I select the option to delete a specific review and rating
    */
    public function iSelectTheOptionToDeleteASpecificReviewAndRating()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select the option to delete a specific review and rating` is not defined");
    }

   /**
    * @Then the selected review and rating should be removed from my review history
    */
    public function theSelectedReviewAndRatingShouldBeRemovedFromMyReviewHistory()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the selected review and rating should be removed from my review history` is not defined");
    }

   /**
    * @Given I am on the administrator dashboard
    */
    public function iAmOnTheAdministratorDashboard()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on the administrator dashboard` is not defined");
    }

   /**
    * @When I navigate to the customer information section
    */
    public function iNavigateToTheCustomerInformationSection()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I navigate to the customer information section` is not defined");
    }

   /**
    * @When I select a customer profile to edit
    */
    public function iSelectACustomerProfileToEdit()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select a customer profile to edit` is not defined");
    }

   /**
    * @Then I should be able to change the customer's name, contact details, and address
    */
    public function iShouldBeAbleToChangeTheCustomersNameContactDetailsAndAddress()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to change the customer's name, contact details, and address` is not defined");
    }

   /**
    * @When I save the changes
    */
    public function iSaveTheChanges()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I save the changes` is not defined");
    }

   /**
    * @Then the customer's information should be updated in the system
    */
    public function theCustomersInformationShouldBeUpdatedInTheSystem()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the customer's information should be updated in the system` is not defined");
    }

   /**
    * @Given I am logged in as a company administrator
    */
    public function iAmLoggedInAsACompanyAdministrator()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am logged in as a company administrator` is not defined");
    }

   /**
    * @When I access the administrator dashboard
    */
    public function iAccessTheAdministratorDashboard()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I access the administrator dashboard` is not defined");
    }

   /**
    * @Then I should see a dedicated section for managing bookings
    */
    public function iShouldSeeADedicatedSectionForManagingBookings()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see a dedicated section for managing bookings` is not defined");
    }

   /**
    * @Then this section should display a list of upcoming cleaning appointments
    */
    public function thisSectionShouldDisplayAListOfUpcomingCleaningAppointments()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `this section should display a list of upcoming cleaning appointments` is not defined");
    }

   /**
    * @Then I should be able to view booking details, customer information, and perform actions like canceling or rescheduling appointments if needed
    */
    public function iShouldBeAbleToViewBookingDetailsCustomerInformationAndPerformActionsLikeCancelingOrReschedulingAppointmentsIfNeeded()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to view booking details, customer information, and perform actions like canceling or rescheduling appointments if needed` is not defined");
    }

   /**
    * @Given a customer books a cleaning appointment on the website
    */
    public function aCustomerBooksACleaningAppointmentOnTheWebsite()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `a customer books a cleaning appointment on the website` is not defined");
    }

   /**
    * @Then the booking information should be automatically transferred to the company's scheduling system
    */
    public function theBookingInformationShouldBeAutomaticallyTransferredToTheCompanysSchedulingSystem()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the booking information should be automatically transferred to the company's scheduling system` is not defined");
    }

   /**
    * @Then the cleaning crew assigned to the appointment should be notified about the booking details
    */
    public function theCleaningCrewAssignedToTheAppointmentShouldBeNotifiedAboutTheBookingDetails()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the cleaning crew assigned to the appointment should be notified about the booking details` is not defined");
    }

   /**
    * @Given I am a logged-in customer with a history of previous bookings
    */
    public function iAmALoggedinCustomerWithAHistoryOfPreviousBookings()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am a logged-in customer with a history of previous bookings` is not defined");
    }

   /**
    * @When I select a previous service that I want to rebook
    */
    public function iSelectAPreviousServiceThatIWantToRebook()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I select a previous service that I want to rebook` is not defined");
    }

   /**
    * @Then I should see an option to 'Rebook' this service
    */
    public function iShouldSeeAnOptionToRebookThisService()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see an option to 'Rebook' this service` is not defined");
    }

   /**
    * @When I click on 'Rebook'
    */
    public function iClickOnRebook()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I click on 'Rebook'` is not defined");
    }

   /**
    * @Then the system should automatically fill in the booking details based on the selected previous service
    */
    public function theSystemShouldAutomaticallyFillInTheBookingDetailsBasedOnTheSelectedPreviousService()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the system should automatically fill in the booking details based on the selected previous service` is not defined");
    }

   /**
    * @Then I should be able to modify any detail like date and time before confirming
    */
    public function iShouldBeAbleToModifyAnyDetailLikeDateAndTimeBeforeConfirming()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to modify any detail like date and time before confirming` is not defined");
    }

   /**
    * @When I confirm the rebooking
    */
    public function iConfirmTheRebooking()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I confirm the rebooking` is not defined");
    }

   /**
    * @Then I should receive a confirmation message with the details of my rebooked service
    */
    public function iShouldReceiveAConfirmationMessageWithTheDetailsOfMyRebookedService()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should receive a confirmation message with the details of my rebooked service` is not defined");
    }

   /**
    * @Given I am rebooking a previous service
    */
    public function iAmRebookingAPreviousService()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am rebooking a previous service` is not defined");
    }

   /**
    * @When I am given the option to modify the booking details
    */
    public function iAmGivenTheOptionToModifyTheBookingDetails()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am given the option to modify the booking details` is not defined");
    }

   /**
    * @Then I should be able to change the date, time, and any specific instructions or add-ons
    */
    public function iShouldBeAbleToChangeTheDateTimeAndAnySpecificInstructionsOrAddons()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be able to change the date, time, and any specific instructions or add-ons` is not defined");
    }

   /**
    * @When I save these changes
    */
    public function iSaveTheseChanges()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I save these changes` is not defined");
    }

   /**
    * @Then my rebooking should reflect these modifications
    */
    public function myRebookingShouldReflectTheseModifications()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `my rebooking should reflect these modifications` is not defined");
    }

   /**
    * @Then I should receive a confirmation of the updated booking details
    */
    public function iShouldReceiveAConfirmationOfTheUpdatedBookingDetails()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should receive a confirmation of the updated booking details` is not defined");
    }

   /**
    * @Given I am a returning customer but have not saved any payment methods
    */
    public function iAmAReturningCustomerButHaveNotSavedAnyPaymentMethods()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am a returning customer but have not saved any payment methods` is not defined");
    }

   /**
    * @When I navigate to the :arg1 section in :arg2
    */
    public function iNavigateToTheSectionIn($arg1, $arg2)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I navigate to the :arg1 section in :arg2` is not defined");
    }

   /**
    * @Then I should see a message indicating that I have no saved payment methods
    */
    public function iShouldSeeAMessageIndicatingThatIHaveNoSavedPaymentMethods()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see a message indicating that I have no saved payment methods` is not defined");
    }

   /**
    * @Then I should be presented with an option to add a new payment method
    */
    public function iShouldBePresentedWithAnOptionToAddANewPaymentMethod()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be presented with an option to add a new payment method` is not defined");
    }

}
