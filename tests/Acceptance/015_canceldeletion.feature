Feature: Canceling attempt to deleted booking

Scenario: Canceling the deletion of a booking
    Given I am a logged-in customer
    And I have an existing booking
    When I navigate to my booking history
    And I select the option to delete a specific booking
    Then I should receive a prompt to confirm the deletion
    When I cancel the deletion
    Then the booking should remain in my booking history
    And no changes should be made to my bookings
