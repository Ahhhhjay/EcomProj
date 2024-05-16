Feature: Specific Descriptions

When i have a request or specific details on how i want my house to be cleaned
I want to be able to write my needs

Scenario: Select Specific Areas to Clean
  Given I am on the "Booking/create" page
  When I want to put specific details of my cleaning 
  Then I should see a "description" text field
  And I write that I want  "kitchen, bathroom" cleaned
  

  