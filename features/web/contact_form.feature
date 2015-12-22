Feature: Contact form

  @javascript
  Scenario: Submits feedback when required fields are filled out
    Given I am on homepage
    When I follow "Contacte con nosotros"
    And I fill in "Asunto" with "Servicio de atención al cliente"
    And I fill in "Correo electrónico" with "visitor@example.com"
    And I fill in "Mensaje" with "It took a long time waiting for my order"
    And I press "Enviar"
    Then I should see "Su mensaje ha sido enviado a nuestro equipo."
