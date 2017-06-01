Feature: Frontpage Radio2 Top30
  Testen elementen

  @javascript
  Scenario: laden frontpage
    Given I am on "/" 
    Then I should see 1 "h1" element
