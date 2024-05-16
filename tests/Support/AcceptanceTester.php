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
     * @Given I am on the login page
     */
       /**
     * @Given I am on the :arg1 page
     */
    public function iAmOnThePage($arg1)
    {
        $this->amOnPage($arg1);
    }

   /**
    * @When I enter a valid email :arg1 and password :arg2
    */
    public function iEnterAValidEmailAndPassword($arg1, $arg2)
    {
        $this->fillField("Email", $arg1);
        $this->fillField("passwordHash", $arg2);
    }

   /**
    * @When I click on the :arg1 button
    */
    public function iClickOnTheButton($arg1)
    {
        $this->click($arg1);
    }

   /**
    * @Then I should be redirected to the homepage
    */
    public function iShouldBeRedirectedToTheHomepage()
    {
        $this->amOnPage("/");
    }

     /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        $this->amOnPage("/");
    }

        /**
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
        $this->amOnPage("Booking/create");
    }

   /**
    * @When I select :arg1 from the property type options
    */
    public function iSelectFromThePropertyTypeOptions($arg1)
    {
        $this->canSeeOptionIsSelected("category", $arg1);
    }

   /**
    * @When I enter :arg1 into the square footage field
    */
    public function iEnterIntoTheSquareFootageField($arg1)
    {
        $this->fillField("area", $arg1);
    }

   /**
    * @When I click the :arg1 button
    */
    public function iClickTheButton($arg1)
    {
        $this->click($arg1);
    }

   /**
    * @Then I should see my booking details
    */
    public function iShouldSeeMyBookingDetails()
    {
        $this->amOnPage("Booking/complete");
    }

    //case 3

    /**
     * @Given I am logged in as a customer
     */
    public function iAmLoggedInAsACustomer()
    {
       $this->iAmLoggedIn();
    }

   /**
    * @When I navigate to the booking page
    */
      /**
     * @When I navigate to the :arg1 page
     */
    public function iNavigateToThePage($arg1)
    {
        $this->amOnPage($arg1);
    }

   /**
    * @When I select :arg1 from the appointment frequency dropdown
    */
    public function iSelectFromTheAppointmentFrequencyDropdown($arg1)
    {
        //$this->fillField("frequency", $arg1);
        $this->selectOption("frequency",$arg1);
    }

       /**
     * @Then I should see a :arg1 box so I can input my information
     */
    public function iShouldSeeABoxSoICanInputMyInformation($arg1)
    {
        $this->fillField("frequencyMessage",$arg1);
    }

   /**
    * @Then I select my Sunday at :num1::num2:num2 PM for the initial cleaning
    */
    public function iSelectMySundayAtPMForTheInitialCleaning($num1, $num2, $num3)
    {
        $this->fillField("area", $num1);
        $this->fillField("bookingDate", $num2);
        $this->fillField("bookingTime", $num3);
       
    }

   /**
    * @Then I should be redirected to a confirmation page about my appointment
    */
    public function iShouldBeRedirectedToAConfirmationPageAboutMyAppointment()
    {
        $this->amOnPage("Booking/complete");
    }

      /**
     * @When I want to put specific details of my cleaning
     */
     /**
     * @When I want to put specific details of my cleaning
     */
    public function iWantToPutSpecificDetailsOfMyCleaning()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I want to put specific details of my cleaning` is not defined");
    }

   /**
    * @Then I should see a :arg1 text field
    */
    public function iShouldSeeATextField($arg1)
    {
        $this->seeElement("description", $arg1);
    }

   /**
    * @Then I write that I want  :arg1 cleaned
    */
    public function iWriteThatIWantCleaned($arg1)
    {
        $this->fillField("description", $arg1);
    }


}
