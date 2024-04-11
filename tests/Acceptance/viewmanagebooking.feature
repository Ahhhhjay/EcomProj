Feature:Viewing and managing the bookings
Scenario: View and Manage Bookings
  Given I am logged in as a company administrator
  When I access the administrator dashboard
  Then I should see a dedicated section for managing bookings
  And this section should display a list of upcoming cleaning appointments
  And I should be able to view booking details, customer information, and perform actions like canceling or rescheduling appointments if needed