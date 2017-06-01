Feature: Controle parent hitlijst

@mink:goutte
Scenario: 
  Given I am on "https://hitlijst.conceptbox.be/api/lists?parent_lid=872"
  Then the response should be in JSON
