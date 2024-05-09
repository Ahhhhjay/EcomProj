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
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
        $this->amOnPage("I am on $arg1");
    }

    /**
     * @Then the estimated price should be based on the average cleaning rates for residential for :arg1 square feet
     */
    public function theEstimatedPriceShouldBeBasedOnTheAverageCleaningRatesForResidentialForSquareFeet($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `the estimated price should be based on the average cleaning rates for residential for :arg1 square feet` is not defined");
    }
}