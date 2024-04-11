Feature: No Saved payment  
Scenario: No saved payment methods available
    Given I am a returning customer but have not saved any payment methods
    When I navigate to the "Payment Methods" section in "My Account"
    Then I should see a message indicating that I have no saved payment methods
    And I should be presented with an option to add a new payment method