Feature: Deleting a booking

  
Scenario: Successfully deleting a booking
    Given I am a logged-in customer
    And I have an existing booking
    When I navigate to my booking history
    And I select the option to delete a specific booking
    Then I should receive a prompt to confirm the deletion
    When I confirm the deletion
    Then the selected booking should be removed from my booking history
    And I should receive a confirmation message that the booking has been successfully deleted