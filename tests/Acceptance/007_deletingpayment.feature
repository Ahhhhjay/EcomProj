Feature: Deleting payment method
Scenario: Deleting a saved payment method
    Given I am viewing my list of saved payment methods
    When I choose to delete a payment method
    Then I should receive a prompt to confirm the deletion to prevent accidental removal
    When I confirm the deletion
    Then the payment method should be permanently removed from my account
