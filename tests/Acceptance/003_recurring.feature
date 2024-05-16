Feature: recurring

Scenario:   Book Recurring Cleaning (Every Other Week)
  Given I am logged in as a customer
  When I navigate to the "Booking/create" page
  And I select "Weekly" from the appointment frequency dropdown
  Then I should see a "frequencyMessage" box so I can input my information
  And I select my Sunday at 2:00 PM for the initial cleaning
  And I click the "submit" button
  Then I should be redirected to a confirmation page about my appointment
  
