Feature: Rescheduling an appointment less than 2 days in advance

Scenario: Attempting to reschedule an appointment less than 2 days in advance
    Given I am a logged-in customer
    And I have an existing booking less than 2 days from now
    When I attempt to reschedule this booking
    Then I should receive a message indicating that rescheduling is not possible
    And I should be advised to contact customer service for further assistance
