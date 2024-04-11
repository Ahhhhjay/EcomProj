Feature: Viewing to see possible rescheduling

Scenario: Viewing available times for rescheduling
    Given I am a logged-in customer
    And I have an existing booking more than 2 days from now
    When I choose to reschedule this booking
    Then I should be presented with a calendar showing available times and dates
    And only times and dates more than 2 days in the future should be selectable
