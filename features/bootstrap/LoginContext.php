<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class LoginContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am not logged in
     */
    public function iAmNotLoggedIn()
    {
        $this->assertSession()->pageTextContains("Iniciar sesión");
    }

    /**
     * @When I go to account page :page
     */
    public function iGoToAccountPage($page)
    {
        $this->visit($page);
    }

    /**
    * @Given I am logged in with user :email and password :password
    */
    public function iAmLoggedInWithUserAndPassword($email, $password)
    {
        $this->getSession()->visit($this->locatePath('/es/my-account'));
        $page = $this->getSession()->getPage();
        $page->fillField('email', $email);
        $page->fillField('passwd', $password);
        $page->pressButton('SubmitLogin');
    }

    /**
     * @Then I should be on the account page :page
     */
    public function iShouldBeOnTheAccountPage($page)
    {
        $this->assertPageAddress($page);
    }

    /**
     * @Given browser window maximized
     */
    public function browserWindowMaximized()
    {
        $this->getSession()->maximizeWindow();
    }
}
