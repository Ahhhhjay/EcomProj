Feature: quote
  In order to provide potential clients with quick quotes for cleaning services
  As a cleaning service website
  I want to give an instant quote based on apartment size and type

  Background:
    Given I am logged in

  Scenario: Instant Quote for Small Apartment
    Given I am on "Booking page"
    When I select "Residential" from the property type options
    And I enter "27" into the square footage field
    And I click the "submit" button
    Then I should see my booking details
    

