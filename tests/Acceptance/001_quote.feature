Feature: quote
  In order to provide potential clients with quick quotes for cleaning services
  As a cleaning service website
  I want to give an instant quote based on apartment size and type

  Scenario: Instant Quote for Small Apartment
    Given I am on the cleaning service website homepage
    When I select "Apartment" from the property type options
    And I enter "500" into the square footage field
    And I click the "Get Quote" button
    Then I should see an estimated price displayed for cleaning a small apartment
    And the estimated price should be based on the average cleaning rates for small apartments for "500" square feet and travel rates

