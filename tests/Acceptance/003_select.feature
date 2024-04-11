Feature: Select 

Scenario: Select Specific Areas to Clean
  Given I am on the booking page
  When I expand the "Cleaning Options" section
  And I select specific rooms or areas I want cleaned (e.g., kitchen, bathroom)
  And I choose any additional services I desire (e.g., oven cleaning)
  Then the total price of the cleaning service should be automatically updated
  And only the selected areas and services should be included in the cleaning job description
