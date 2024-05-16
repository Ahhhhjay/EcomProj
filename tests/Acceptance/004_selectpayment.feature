Feature: Making payment
When I make my booking selections, I should fill another form
involving my payment details

Scenario: Making a payment
    Given I am a logged-in customer
    When I proceed to checkout for a new booking
    Then I should be presented with a dropdown list of my saved payment methods
    And I can select any one of my previously used payment methods for the current transaction
