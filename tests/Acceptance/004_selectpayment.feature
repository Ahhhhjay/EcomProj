Feature: Select payment
Scenario: Selecting from saved payment methods at checkout
    Given I am a logged-in customer who has used multiple payment methods for past bookings
    When I proceed to checkout for a new booking
    Then I should be presented with a dropdown list of my saved payment methods
    And I can select any one of my previously used payment methods for the current transaction
