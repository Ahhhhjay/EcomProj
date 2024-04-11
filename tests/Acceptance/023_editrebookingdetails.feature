Feature:Editing the rebooking
Scenario: Editing details during the rebooking process
    Given I am rebooking a previous service
    When I am given the option to modify the booking details
    Then I should be able to change the date, time, and any specific instructions or add-ons
    When I save these changes
    Then my rebooking should reflect these modifications
    And I should receive a confirmation of the updated booking details
