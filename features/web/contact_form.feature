Feature: Contact form

  @javascript
  Scenario: Submits feedback when required fields are filled out
    Given I am on homepage
    When I follow "Contacte con nosotros"
    And I select "Servicio de atención al cliente" from "Asunto"
    And I fill in the following:
      |Correo electrónico     |visitor@example.com                      |
      |Mensaje                |It took a long time waiting for my order |
    And I press "Enviar"
    Then I should see "Su mensaje ha sido enviado a nuestro equipo."
