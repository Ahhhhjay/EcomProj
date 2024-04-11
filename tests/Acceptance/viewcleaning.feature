Feature: View the cleaning procedures

Scenario: View Cleaning Procedures and Insurance
  Given I am on the cleaning service website homepage
  When I click on the "About Us" link
  Then I should see a dedicated page with detailed information about the company
  And this page should include sections on cleaning procedures, eco-friendly practices (if applicable), and insurance policies