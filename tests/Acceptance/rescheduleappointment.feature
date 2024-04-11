Feature: Rescheduling an appointment more than 2 days in advance


Scenario: Rescheduling an appointment more than 2 days in advance
    Given I am a logged-in customer
    And I have an existing booking more than 2 days from now
    When I choose to reschedule this booking
    And I select a new available time and date more than 2 days in the future
    Then my booking should be updated to the new time and date
    And I should receive a confirmation of the rescheduling