Feature: Viewing the confirmation

Scenario: Viewing the booking confirmation page after making a booking
    Given I am a logged-in customer
    When I complete a booking for a cleaning service
    Then I should be redirected to a booking confirmation page
    And I should see the date and time of my booking
    And I should see the list of services I have booked
    And I should see the total cost of my booking
    And I should see the location where the service will be provided
    And I should have options to print, save, or email the confirmation

