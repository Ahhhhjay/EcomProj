Feature:Booking scheduling
Scenario: Booking Synchronization with Scheduling System
  Given a customer books a cleaning appointment on the website
  Then the booking information should be automatically transferred to the company's scheduling system
  And the cleaning crew assigned to the appointment should be notified about the booking details
