Feature:Deleting a review and rating
Scenario: Successfully deleting a review and rating
    Given I am a logged-in customer
    And I have previously submitted a review and rating for a cleaning service
    When I navigate to my submitted reviews
    And I select the option to delete a specific review and rating
    Then I should receive a prompt to confirm the deletion
    When I confirm the deletion
    Then the selected review and rating should be removed from my review history
