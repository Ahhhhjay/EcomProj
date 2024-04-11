Feature: recurring

Scenario:   Book Recurring Cleaning (Every Other Week)
  Given I am logged in as a returning customer
  When I navigate to the booking page
  And I select "Recurring" from the appointment frequency options
  And I choose "Every 2 Weeks" from the recurrence interval dropdown
  And I select my Sunday at 2:00 PM for the initial cleaning
  And I click the "Book Now" button
  Then a confirmation message should be displayed for the recurring cleaning appointments
  And the upcoming cleaning appointments should be scheduled on a bi-weekly basis on Sunday 2:00 PM
