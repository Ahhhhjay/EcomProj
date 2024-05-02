Feature: View payment

Scenario: Viewing all saved payment methods
    Given I am a logged-in customer with previously saved payment methods
    When I navigate to the "My Account" section
    And I select "Payment Methods"
    Then I should see a list of all my saved payment methods
    And for each payment method, options to edit or delete it
