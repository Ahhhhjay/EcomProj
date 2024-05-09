Feature: quote
  In order to provide potential clients with quick quotes for cleaning services
  As a cleaning service website
  I want to give an instant quote based on apartment size and type

  Scenario: Instant Quote for Small Apartment
    Given I am on "http://localhost/Home/index"
    When I select "Residential" from the property type options
    And I enter "27" into the square footage field
    And I click the "Submit booking" button
    Then I should see an estimated price displayed for cleaning a small apartment
    And the estimated price should be based on the average cleaning rates for residential for "27" square feet

