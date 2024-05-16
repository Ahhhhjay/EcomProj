Feature: Viewing the confirmation
As a customer, once I've made my booking 
I want to view all details of my booking

Background:I am logged in

Scenario: Viewing the booking confirmation page after making a booking
    Given I am on the "Complete" page
    When 
    And I look at the "Booking" form I should see the "date" and "time" of my reservation
    Then I should see another "form"
    And I should see the list of services I have booked
    And I should see the total cost of my booking
    And I should see the location where the service will be provided
    And I should have options to print, save, or email the confirmation

