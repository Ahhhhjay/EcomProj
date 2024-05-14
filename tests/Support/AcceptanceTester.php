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
    public function iAmOnTheLoginPage()
    {
      $this->amOnPage("Customer/login");
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
}
