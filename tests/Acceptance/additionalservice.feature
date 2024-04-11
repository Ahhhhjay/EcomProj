Feature: Requesting additional services


	Scenario: Request Additional Service
  Given I am logged in as a customer
  When I navigate to the "My Bookings" section
  And I select an upcoming cleaning appointment
  And I click the "Modify Service" button
  Then I should be able to add additional services (e.g., oven cleaning) to the existing booking
  And the total price of the cleaning should be automatically updated to reflect the added service
