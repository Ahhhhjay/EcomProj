Feature:Wanting to modifying a review
Scenario: Successfully modifying a review and rating
    Given I am a logged-in customer
    And I have previously submitted a review and rating for a cleaning service
    When I navigate to my submitted reviews
    And I select the option to modify a specific review and rating
    Then I should be able to edit the text of my review
    And I should be able to change the star rating
    When I save my changes
    Then my review and rating should be updated immediately