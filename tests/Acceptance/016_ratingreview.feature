Feature: If user wants to leave a rating or review

Scenario:  Leave Rating and Review
  Given I have completed a cleaning service appointment
  When I receive a notification to leave a review
  And I click on the link to submit a review
  Then I should be able to provide a star rating and write a detailed review of the cleaning service
  And the review should be submitted and displayed on the company's profile page (after moderation if applicable)
