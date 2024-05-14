Feature: User Login

  As a registered user of CleanIt Services
  I want to log in to my account
  So that I can access my personalized services
    

  Scenario: Successful Login
    Given I am on the login page
    When I enter a valid email "user@example.com" and password "correctPassword"
    And I click on the "action" button
    Then I should be redirected to the homepage
    
