Feature: Edit Payment

Scenario: Editing a saved payment method
    Given I am viewing my list of saved payment methods
    When I choose to edit a payment method
    Then I should be able to update the payment method's details such as the card number, expiration date, and billing address
    And I should see an option to save my changes
    When I save my changes
    Then the payment method should be updated with the new details