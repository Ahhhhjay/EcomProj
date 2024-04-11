Feature:Editing customer information
 Scenario: Editing customer information
    Given I am on the administrator dashboard
    When I navigate to the customer information section
    And I select a customer profile to edit
    Then I should be able to change the customer's name, contact details, and address
    When I save the changes
    Then the customer's information should be updated in the system