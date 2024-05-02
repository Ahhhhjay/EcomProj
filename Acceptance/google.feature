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
	
  Scenario:   Book Recurring Cleaning (Every Other Week)
  Given I am logged in as a returning customer
  When I navigate to the booking page
  And I select "Recurring" from the appointment frequency options
  And I choose "Every 2 Weeks" from the recurrence interval dropdown
  And I select my Sunday at 2:00 PM for the initial cleaning
  And I click the "Book Now" button
  Then a confirmation message should be displayed for the recurring cleaning appointments
  And the upcoming cleaning appointments should be scheduled on a bi-weekly basis on Sunday 2:00 PM



	Scenario: Select Specific Areas to Clean
  Given I am on the booking page
  When I expand the "Cleaning Options" section
  And I select specific rooms or areas I want cleaned (e.g., kitchen, bathroom)
  And I choose any additional services I desire (e.g., oven cleaning)
  Then the total price of the cleaning service should be automatically updated
  And only the selected areas and services should be included in the cleaning job description

Scenario: Selecting from saved payment methods at checkout
    Given I am a logged-in customer who has used multiple payment methods for past bookings
    When I proceed to checkout for a new booking
    Then I should be presented with a dropdown list of my saved payment methods
    And I can select any one of my previously used payment methods for the current transaction

Scenario: Viewing all saved payment methods
    Given I am a logged-in customer with previously saved payment methods
    When I navigate to the "My Account" section
    And I select "Payment Methods"
    Then I should see a list of all my saved payment methods
    And for each payment method, options to edit or delete it
Scenario: No saved payment methods available
    Given I am a returning customer but have not saved any payment methods
    When I navigate to the "Payment Methods" section in "My Account"
    Then I should see a message indicating that I have no saved payment methods
    And I should be presented with an option to add a new payment method

Scenario: Editing a saved payment method
    Given I am viewing my list of saved payment methods
    When I choose to edit a payment method
    Then I should be able to update the payment method's details such as the card number, expiration date, and billing address
    And I should see an option to save my changes
    When I save my changes
    Then the payment method should be updated with the new details

Scenario: Deleting a saved payment method
    Given I am viewing my list of saved payment methods
    When I choose to delete a payment method
    Then I should receive a prompt to confirm the deletion to prevent accidental removal
    When I confirm the deletion
    Then the payment method should be permanently removed from my account

Scenario: Viewing the booking confirmation page after making a booking
    Given I am a logged-in customer
    When I complete a booking for a cleaning service
    Then I should be redirected to a booking confirmation page
    And I should see the date and time of my booking
    And I should see the list of services I have booked
    And I should see the total cost of my booking
    And I should see the location where the service will be provided
    And I should have options to print, save, or email the confirmation




Scenario: View Cleaning Procedures and Insurance
  Given I am on the cleaning service website homepage
  When I click on the "About Us" link
  Then I should see a dedicated page with detailed information about the company
  And this page should include sections on cleaning procedures, eco-friendly practices (if applicable), and insurance policies

Scenario: Rescheduling an appointment more than 2 days in advance
    Given I am a logged-in customer
    And I have an existing booking more than 2 days from now
    When I choose to reschedule this booking
    And I select a new available time and date more than 2 days in the future
    Then my booking should be updated to the new time and date
    And I should receive a confirmation of the rescheduling

  Scenario: Attempting to reschedule an appointment less than 2 days in advance
    Given I am a logged-in customer
    And I have an existing booking less than 2 days from now
    When I attempt to reschedule this booking
    Then I should receive a message indicating that rescheduling is not possible
    And I should be advised to contact customer service for further assistance

  Scenario: Viewing available times for rescheduling
    Given I am a logged-in customer
    And I have an existing booking more than 2 days from now
    When I choose to reschedule this booking
    Then I should be presented with a calendar showing available times and dates
    And only times and dates more than 2 days in the future should be selectable

	Scenario: Request Additional Service
  Given I am logged in as a customer
  When I navigate to the "My Bookings" section
  And I select an upcoming cleaning appointment
  And I click the "Modify Service" button
  Then I should be able to add additional services (e.g., oven cleaning) to the existing booking
  And the total price of the cleaning should be automatically updated to reflect the added service

Scenario: Successfully deleting a booking
    Given I am a logged-in customer
    And I have an existing booking
    When I navigate to my booking history
    And I select the option to delete a specific booking
    Then I should receive a prompt to confirm the deletion
    When I confirm the deletion
    Then the selected booking should be removed from my booking history
    And I should receive a confirmation message that the booking has been successfully deleted

  Scenario: Canceling the deletion of a booking
    Given I am a logged-in customer
    And I have an existing booking
    When I navigate to my booking history
    And I select the option to delete a specific booking
    Then I should receive a prompt to confirm the deletion
    When I cancel the deletion
    Then the booking should remain in my booking history
    And no changes should be made to my bookings

Scenario:  Leave Rating and Review
  Given I have completed a cleaning service appointment
  When I receive a notification to leave a review
  And I click on the link to submit a review
  Then I should be able to provide a star rating and write a detailed review of the cleaning service
  And the review should be submitted and displayed on the company's profile page (after moderation if applicable)

Scenario: Successfully modifying a review and rating
    Given I am a logged-in customer
    And I have previously submitted a review and rating for a cleaning service
    When I navigate to my submitted reviews
    And I select the option to modify a specific review and rating
    Then I should be able to edit the text of my review
    And I should be able to change the star rating
    When I save my changes
    Then my review and rating should be updated immediately

Scenario: Successfully deleting a review and rating
    Given I am a logged-in customer
    And I have previously submitted a review and rating for a cleaning service
    When I navigate to my submitted reviews
    And I select the option to delete a specific review and rating
    Then I should receive a prompt to confirm the deletion
    When I confirm the deletion
    Then the selected review and rating should be removed from my review history

Scenario: Viewing the FAQ section for information on services
    Given I am a visitor or a logged-in customer on the website
    When I navigate to the FAQ section
    Then I should see a list of frequently asked questions
    And I should be able to click on a question to view its answer
    And the answers should cover topics related to cleaning services offered


Scenario: Accessing the photo gallery from the homepage
    Given I am a visitor on the company's homepage
    When I navigate to the 'Gallery' section
    Then I should see a collection of before-and-after photos of various cleaning projects
    And I can click on any photo to view it in larger detail

Scenario: Browsing through the photo gallery
    Given I am in the 'Gallery' section viewing before-and-after photos
    When I select a photo
    Then I should see an expanded view of the photo
    And I should have options to navigate to the next or previous photo in the gallery

Scenario: Accessing the photo gallery without sufficient images
    Given I am a visitor interested in viewing the company's past work
    When I navigate to the 'Gallery' section
    And the company has not uploaded sufficient before-and-after photos
    Then I should see a message indicating that more photos are coming soon
    And there might be an option to contact the company directly for more examples of their work

Scenario:  View
  Given I am logged in as a company administrator
  When I access the administrator dashboard
  Then I should see a dedicated section for managing bookings
  And this section should display a list of upcoming cleaning appointments
  And I should be able to view booking details and customer information

Scenario: Editing a customer's booking details
    Given I am a logged-in administrator on the dashboard
    When I navigate to the bookings section
    And I select a booking to edit
    Then I should be able to modify the booking's date, time, service type, and any special requests
    When I save the changes
    Then the booking should be updated with the new details

  Scenario: Editing customer information
    Given I am on the administrator dashboard
    When I navigate to the customer information section
    And I select a customer profile to edit
    Then I should be able to change the customer's name, contact details, and address
    When I save the changes
    Then the customer's information should be updated in the system

Scenario: Successfully deleting a booking
    Given I am a logged-in administrator on the dashboard
    When I navigate to the bookings section
    And I select a booking to delete
    Then I should receive a prompt to confirm the deletion to prevent accidental removal
    When I confirm the deletion
    Then the selected booking should be permanently removed from the system
    And I should receive a confirmation message that the booking has been successfully deleted



Scenario: View and Manage Bookings
  Given I am logged in as a company administrator
  When I access the administrator dashboard
  Then I should see a dedicated section for managing bookings
  And this section should display a list of upcoming cleaning appointments
  And I should be able to view booking details, customer information, and perform actions like canceling or rescheduling appointments if needed

Scenario: See Promotions on Website
  Given there are active promotions offered by the cleaning company
  When I visit the cleaning service website homepage
  Then I should see banners or announcements highlighting the ongoing promotions
  And I should be able to click on these promotions to learn more details about the discounts or special offers


Scenario: Booking Synchronization with Scheduling System
  Given a customer books a cleaning appointment on the website
  Then the booking information should be automatically transferred to the company's scheduling system
  And the cleaning crew assigned to the appointment should be notified about the booking details

Scenario: Secure Online Payment
  Given a customer confirms a cleaning appointment
  When they proceed to the payment section
  Then they should be directed to a secure payment gateway for processing the payment
  And the payment gateway should integrate seamlessly with the website to ensure secure transaction processing

Scenario: Accessing the feedback analysis dashboard
    Given I am a logged-in administrator
    When I navigate to the feedback analysis dashboard
    Then I should see an overview of recent customer feedback and ratings

Scenario: Successfully deleting an inappropriate or fake review
    Given I am a logged-in administrator
    When I identify a review that is inappropriate or fake
    And I select the option to delete this review
    Then I should receive a prompt to confirm the deletion to prevent accidental deletions
    When I confirm the deletion
    Then the review should be permanently removed from the platform
    And I should receive a confirmation message that the review has been successfully deleted

Scenario: Rebooking a previous service from booking history
    Given I am a logged-in customer with a history of previous bookings
    When I navigate to my booking history
    And I select a previous service that I want to rebook
    Then I should see an option to 'Rebook' this service
    When I click on 'Rebook'
    Then the system should automatically fill in the booking details based on the selected previous service
    And I should be able to modify any detail like date and time before confirming
    When I confirm the rebooking
    Then I should receive a confirmation message with the details of my rebooked service

Scenario: Editing details during the rebooking process
    Given I am rebooking a previous service
    When I am given the option to modify the booking details
    Then I should be able to change the date, time, and any specific instructions or add-ons
    When I save these changes
    Then my rebooking should reflect these modifications
    And I should receive a confirmation of the updated booking details

