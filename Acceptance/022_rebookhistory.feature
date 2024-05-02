Feature:Rebooking from history
Scenario: Rebooking a previous service from booking history
    Given I am a logged-in customer with a history of previous bookings
    When I navigate to my booking history
    And I select a previous service that I want to rebook
    Then I should see an option to 'Rebook' this service
    When I click on 'Rebook'
    Then the system should automatically fill in the booking details based on the selected previous service
    And I should be able to modify any detail like date and time before confirming
    When I confirm the rebooking
    Then I should receive a confirmation message with the details of my rebooked service
